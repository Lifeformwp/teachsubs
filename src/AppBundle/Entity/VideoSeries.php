<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="video_series")
 */
class VideoSeries
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=340)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Videos", inversedBy="course")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;

    /**
     * @ORM\Column(type="string")
     */
    private $en_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $ru_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $it_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $de_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $jp_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $fr_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $zh_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $cs_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $lt_sub;

    /**
     * @ORM\Column(type="string")
     */
    private $pl_sub;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection|VideoSeries[]
     */
    public function getSubtitles()
    {
        return $this->subtitles;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo(Videos $video)
    {
        $this->video = $video;
    }

    public function getEnglishSub()
    {
        return $this->en_sub;
    }

    public function setEnglishSub($en_sub)
    {
        $this->en_sub = $en_sub;
    }

    public function getRussianSub()
    {
        return $this->ru_sub;
    }

    public function setRussianSub($ru_sub)
    {
        $this->ru_sub = $ru_sub;
    }

    public function getItalianSub()
    {
        return $this->it_sub;
    }

    public function setItalianSub($it_sub)
    {
        $this->it_sub = $it_sub;
    }

    public function getGermanSub()
    {
        return $this->de_sub;
    }

    public function setGermanSub($de_sub)
    {
        $this->de_sub = $de_sub;
    }

    public function getJapaneseSub()
    {
        return $this->jp_sub;
    }

    public function setJapaneseSub($jp_sub)
    {
        $this->jp_sub = $jp_sub;
    }

    public function getFrenchSub()
    {
        return $this->fr_sub;
    }

    public function setFrenchSub($fr_sub)
    {
        $this->fr_sub = $fr_sub;
    }

    public function getChineseSub()
    {
        return $this->zh_sub;
    }

    public function setChineseSub($zh_sub)
    {
        $this->zh_sub = $zh_sub;
    }

    public function getCzechSub()
    {
        return $this->cs_sub;
    }

    public function setCzechSub($cs_sub)
    {
        $this->cs_sub = $cs_sub;
    }

    public function getLithuanianSub()
    {
        return $this->lt_sub;
    }

    public function setLithuanianSub($lt_sub)
    {
        $this->lt_sub = $lt_sub;
    }

    public function getPolishSub()
    {
        return $this->pl_sub;
    }

    public function setPolishSub($pl_sub)
    {
        $this->pl_sub = $pl_sub;
    }
}