<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoSeriesRepository")
 * @ORM\Table(name="video_series")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $en_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ru_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $it_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $de_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $jp_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fr_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $zh_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $cs_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $lt_sub;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $pl_sub;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = true;


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

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created_at = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated_at = new \DateTime("now");
    }

    public function getIsPublished()
    {
        return $this->isPublished;
    }

    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}