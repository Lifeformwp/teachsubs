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
     * @ORM\OneToMany(targetEntity="SeriesSubtitles", mappedBy="series")
     */
    private $subtitles;

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
}