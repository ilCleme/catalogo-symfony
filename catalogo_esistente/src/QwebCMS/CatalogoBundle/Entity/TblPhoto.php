<?php

namespace QwebCMS\CatalogoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * TblPhoto
 *
 * @ORM\Table(name="tbl_photo")
 * @ORM\Entity(repositoryClass="QwebCMS\CatalogoBundle\Entity\TblPhotoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TblPhoto
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
     * @ORM\Column(name="id_tbl_photo", type="bigint", options={"default":0})
     */
    private $idTblPhoto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tbl_lingua", type="bigint", options={"default":4})
     */
    private $idTblLingua;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="img_big", type="string", length=255)
     */
    private $imgBig;

    /**
     * @var integer
     *
     * @ORM\Column(name="thumbnail_x", type="bigint", options={"default":0})
     */
    private $thumbnailX;

    /**
     * @var integer
     *
     * @ORM\Column(name="thumbnail_y", type="bigint", options={"default":0})
     */
    private $thumbnailY;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tbl_photo_cat", type="bigint", options={"default":0})
     */
    private $idTblPhotoCat;

    /**
     * @var integer
     *
     * @ORM\Column(name="posizione", type="bigint", options={"default":0})
     */
    private $posizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="pub", type="bigint", options={"default":1})
     */
    private $pub;

    /**
     * @var \DateTime
     */
    private $datamod;

    /**
     * @var string
     *
     * @ORM\Column(name="didascalia", type="string", length=255)
     */
    private $didascalia;


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
     * Set idTblPhoto
     *
     * @param integer $idTblPhoto
     * @return TblPhoto
     */
    public function setIdTblPhoto($idTblPhoto)
    {
        $this->idTblPhoto = $idTblPhoto;

        return $this;
    }

    /**
     * Get idTblPhoto
     *
     * @return integer 
     */
    public function getIdTblPhoto()
    {
        return $this->idTblPhoto;
    }

    /**
     * Set idTblLingua
     *
     * @param integer $idTblLingua
     * @return TblPhoto
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
     * @return TblPhoto
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
     * Set img
     *
     * @param string $img
     * @return TblPhoto
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set imgBig
     *
     * @param string $imgBig
     * @return TblPhoto
     */
    public function setImgBig($imgBig)
    {
        $this->imgBig = $imgBig;

        return $this;
    }

    /**
     * Get imgBig
     *
     * @return string 
     */
    public function getImgBig()
    {
        return $this->imgBig;
    }

    /**
     * Set thumbnailX
     *
     * @param integer $thumbnailX
     * @return TblPhoto
     */
    public function setThumbnailX($thumbnailX)
    {
        $this->thumbnailX = $thumbnailX;

        return $this;
    }

    /**
     * Get thumbnailX
     *
     * @return integer 
     */
    public function getThumbnailX()
    {
        return $this->thumbnailX;
    }

    /**
     * Set thumbnailY
     *
     * @param integer $thumbnailY
     * @return TblPhoto
     */
    public function setThumbnailY($thumbnailY)
    {
        $this->thumbnailY = $thumbnailY;

        return $this;
    }

    /**
     * Get thumbnailY
     *
     * @return integer 
     */
    public function getThumbnailY()
    {
        return $this->thumbnailY;
    }

    /**
     * Set idTblPhotoCat
     *
     * @param integer $idTblPhotoCat
     * @return TblPhoto
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
     * Set posizione
     *
     * @param integer $posizione
     * @return TblPhoto
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
     * Set pub
     *
     * @param integer $pub
     * @return TblPhoto
     */
    public function setPub($pub)
    {
        $this->pub = $pub;

        return $this;
    }

    /**
     * Get pub
     *
     * @return integer 
     */
    public function getPub()
    {
        return $this->pub;
    }

    /**
     * Set datamod
     *
     * @param \DateTime $datamod
     * @return TblPhoto
     */
    public function setDatamod($datamod)
    {
        $this->datamod = $datamod;

        return $this;
    }

    /**
     * Get datamod
     *
     * @return \DateTime 
     */
    public function getDatamod()
    {
        return $this->datamod;
    }

    /**
     * Set didascalia
     *
     * @param string $didascalia
     * @return TblPhoto
     */
    public function setDidascalia($didascalia)
    {
        $this->didascalia = $didascalia;

        return $this;
    }

    /**
     * Get didascalia
     *
     * @return string 
     */
    public function getDidascalia()
    {
        return $this->didascalia;
    }

    /**
     * @ORM\PostPersist
     */
    public function setIdTblPhotoValue(){
        $this->setIdTblPhoto($this->getId());
    }
}
