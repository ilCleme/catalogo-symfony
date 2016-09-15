<?php

namespace IlCleme\CatalogoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * TblPhotoCat
 *
 * @ORM\Table(name="tbl_photo_cat")
 * @ORM\Entity(repositoryClass="IlCleme\CatalogoBundle\Entity\TblPhotoCatRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TblPhotoCat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_padre", type="bigint", nullable=false)
     */
    private $idPadre = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tbl_photo_cat", type="integer", nullable=false)
     */
    private $idTblPhotoCat = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tbl_lingua", type="bigint")
     */
    private $idTblLingua = 4;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer")
     */
    private $num = 50;

    /**
     * @var string
     *
     * @ORM\Column(name="smarty_template", type="string", length=255)
     */
    private $smartyTemplate = 'property_album.tpl';

    /**
     * @var string
     *
     * @ORM\Column(name="smarty_template_alternativo", type="string", length=255, nullable=true)
     */
    private $smartyTemplateAlternativo = 'preview-property_album.tpl';

    /**
     * @var integer
     *
     * @ORM\Column(name="posizione", type="integer")
     */
    private $posizione = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="set_loop", type="boolean", nullable=true)
     */
    private $setLoop = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="set_random", type="boolean", nullable=true)
     */
    private $setRandom = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="foto_big", type="string", length=255)
     */
    private $fotoBig;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPadre
     *
     * @param integer $idPadre
     * @return TblPhotoCat
     */
    public function setIdPadre($idPadre)
    {
        $this->idPadre = $idPadre;

        return $this;
    }

    /**
     * Get idPadre
     *
     * @return integer 
     */
    public function getIdPadre()
    {
        return $this->idPadre;
    }

    /**
     * Set idTblPhotoCat
     *
     * @param integer $idTblPhotoCat
     * @return TblPhotoCat
     */
    public function setIdTblPhotoCat($idTblPhotoCat)
    {
        $this->idTblPhotoCat = $idTblPhotoCat;

        return $this;
    }

    /**
     * Get idTblPhotoCat
     *
     * @return integer 
     */
    public function getIdTblPhotoCat()
    {
        return $this->idTblPhotoCat;
    }

    /**
     * Set idTblLingua
     *
     * @param integer $idTblLingua
     * @return TblPhotoCat
     */
    public function setIdTblLingua($idTblLingua)
    {
        $this->idTblLingua = $idTblLingua;

        return $this;
    }

    /**
     * Get idTblLingua
     *
     * @return integer 
     */
    public function getIdTblLingua()
    {
        return $this->idTblLingua;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return TblPhotoCat
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return TblPhotoCat
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set smartyTemplate
     *
     * @param string $smartyTemplate
     * @return TblPhotoCat
     */
    public function setSmartyTemplate($smartyTemplate)
    {
        $this->smartyTemplate = $smartyTemplate;

        return $this;
    }

    /**
     * Get smartyTemplate
     *
     * @return string 
     */
    public function getSmartyTemplate()
    {
        return $this->smartyTemplate;
    }

    /**
     * Set posizione
     *
     * @param integer $posizione
     * @return TblPhotoCat
     */
    public function setPosizione($posizione)
    {
        $this->posizione = $posizione;

        return $this;
    }

    /**
     * Get posizione
     *
     * @return integer 
     */
    public function getPosizione()
    {
        return $this->posizione;
    }

    /**
     * Set setLoop
     *
     * @param boolean $setLoop
     * @return TblPhotoCat
     */
    public function setSetLoop($setLoop)
    {
        $this->setLoop = $setLoop;

        return $this;
    }

    /**
     * Get setLoop
     *
     * @return boolean 
     */
    public function getSetLoop()
    {
        return $this->setLoop;
    }

    /**
     * Set setRandom
     *
     * @param boolean $setRandom
     * @return TblPhotoCat
     */
    public function setSetRandom($setRandom)
    {
        $this->setRandom = $setRandom;

        return $this;
    }

    /**
     * Get setRandom
     *
     * @return boolean 
     */
    public function getSetRandom()
    {
        return $this->setRandom;
    }


    /**
     * @ORM\PostPersist
     */
    public function setIdTblPhotoCatValue(){
        $this->setIdTblPhotoCat($this->getId());
    }

    /**
     * Set smartyTemplateAlternativo
     *
     * @param string $smartyTemplateAlternativo
     * @return TblPhotoCat
     */
    public function setSmartyTemplateAlternativo($smartyTemplateAlternativo)
    {
        $this->smartyTemplateAlternativo = $smartyTemplateAlternativo;

        return $this;
    }

    /**
     * Get smartyTemplateAlternativo
     *
     * @return string 
     */
    public function getSmartyTemplateAlternativo()
    {
        return $this->smartyTemplateAlternativo;
    }

    /**
     * Set fotoBig
     *
     * @param string $fotoBig
     * @return TblPhotoCat
     */
    public function setFotoBig($fotoBig)
    {
        $this->fotoBig = $fotoBig;

        return $this;
    }

    /**
     * Get fotoBig
     *
     * @return string 
     */
    public function getFotoBig()
    {
        return $this->fotoBig;
    }
}