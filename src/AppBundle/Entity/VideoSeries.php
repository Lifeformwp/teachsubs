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

    public function getEnSub()
    {
        return $this->en_sub;
    }

    public function setEnSub($en_sub)
    {
        $this->en_sub = $en_sub;
    }

    public function getRuSub()
    {
        return $this->ru_sub;
    }

    public function setRuSub($ru_sub)
    {
        $this->ru_sub = $ru_sub;
    }

    public function getItSub()
    {
        return $this->it_sub;
    }

    public function setItSub($it_sub)
    {
        $this->it_sub = $it_sub;
    }

    public function getDeSub()
    {
        return $this->de_sub;
    }

    public function setDeSub($de_sub)
    {
        $this->de_sub = $de_sub;
    }

    public function getJpSub()
    {
        return $this->jp_sub;
    }

    public function setJpSub($jp_sub)
    {
        $this->jp_sub = $jp_sub;
    }

    public function getFrSub()
    {
        return $this->fr_sub;
    }

    public function setFrSub($fr_sub)
    {
        $this->fr_sub = $fr_sub;
    }

    public function getZhSub()
    {
        return $this->zh_sub;
    }

    public function setZhSub($zh_sub)
    {
        $this->zh_sub = $zh_sub;
    }

    public function getCsSub()
    {
        return $this->cs_sub;
    }

    public function setCsSub($cs_sub)
    {
        $this->cs_sub = $cs_sub;
    }

    public function getLtSub()
    {
        return $this->lt_sub;
    }

    public function setLtSub($lt_sub)
    {
        $this->lt_sub = $lt_sub;
    }

    public function getPlSub()
    {
        return $this->pl_sub;
    }

    public function setPlSub($pl_sub)
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