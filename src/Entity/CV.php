<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CVRepository")
 */
class CV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $addresse;
    /**
     * @ORM\Column(type="integer")
     */
    private $age;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $langue;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $comptence;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sousComp;
    /**
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @return mixed
     */
    public function getComptence()
    {
        return $this->comptence;
    }

    /**
     * @return mixed
     */
    public function getSousComp()
    {
        return $this->sousComp;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }



}
