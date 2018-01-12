<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\CV;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Realisation;
use function PHPSTORM_META\type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MainController extends Controller
{
    /**
     *
     * @Route("/")
     * @return Response
     */
    public function index()
    {
        $cv = $this->getDoctrine()
            ->getRepository(CV::class)
            ->find(1);

        $formation = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

        $exp = $this->getDoctrine()
            ->getRepository(Experience::class)
            ->findAll();

        return $this->render("index.twig", [
            "cv"=>$cv,
            "formation"=>$formation,
            "exp"=>$exp,
            ]);

    }
    /**
     * @Route("blog", name="blog")
     * @param Request $request
     * @return Response
     */
    public function blog(Request $request)
    {
        $blog = $this->getDoctrine()
            ->getRepository(Blog::class)
            ->findAll();

        $newBlog = new blog();
        $newBlog->setDate(new \DateTime(date("Y-m-d G:i:s")));

        $form = $this->createFormBuilder($newBlog)
            ->add('Identifiant', TextType::class, [
            'attr' => array('placeholder'=>'Jean dubois'),])
            ->add('Message', TextareaType::class,[
                'attr' => array('class' => 'u-full-width', 'placeholder'=>'Corps du message'),])
            ->add('Valider', SubmitType::class, [
                'label' => 'Valider',
                'attr' => array('class' => 'button-primary'),])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $prodToSave = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($prodToSave);
            $em->flush();

            $blog = $this->getDoctrine()
                ->getRepository(Blog::class)
                ->findAll();
        }

        return $this->render("blog.twig",[
            "blog"=>$blog,
            'form' => $form->createView()]);
    }

    /**
     * @Route("realisation", name="realisation")
     */
    public function realisation()
    {
        $realisation = $this->getDoctrine()
            ->getRepository(Realisation::class)
            ->findAll();

        return $this->render("realisation.twig", ['realisation'=>$realisation]);
    }

    /**
     * @Route("admin", name="admin")
     */
    public function admin()
    {
        return $this->render("admin.twig");
    }
}