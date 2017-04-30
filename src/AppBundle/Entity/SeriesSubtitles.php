<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 30.04.17
 * Time: 15:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="series_subtitles")
 */
class SeriesSubtitles
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $en_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ru_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $it_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $de_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jp_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fr_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zh_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cs_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lt_sub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pl_sub;

    /**
     * @ORM\ManyToOne(targetEntity="VideoSeries", inversedBy="subtitles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $series;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(VideoSeries $series)
    {
        $this->series = $series;
    }

}