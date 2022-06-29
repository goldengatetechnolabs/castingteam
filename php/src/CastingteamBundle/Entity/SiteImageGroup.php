<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteImage
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\SiteImageGroup")
 * @ORM\Table(name="model_site_images_group")
 */
class SiteImageGroup
{
    /**
     * @var SiteImage
     *
     * @ORM\ManyToOne(targetEntity="SiteImage")
     * @ORM\JoinColumn(name="model_site_image_id", referencedColumnName="id", nullable=false)
     * @ORM\Id
     */
    private $siteImage;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false)
     * @ORM\Id
     */
    private $group;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="position", length=11, nullable=true)
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\Column(type="boolean", name="online", nullable=true)
     */
    private $online;

    /**
     * @var int
     *
     * @ORM\Column(type="boolean", name="pdf", nullable=true)
     */
    private $pdf;

    /**
     * @return SiteImage
     */
    public function getSiteImage()
    {
        return $this->siteImage;
    }

    /**
     * @param SiteImage $siteImage
     * @return SiteImageGroup
     */
    public function setSiteImage($siteImage)
    {
        $this->siteImage = $siteImage;
        return $this;
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     * @return SiteImageGroup
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return SiteImageGroup
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return int
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * @param int $online
     * @return SiteImageGroup
     */
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }

    /**
     * @return int
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * @param int $pdf
     * @return SiteImageGroup
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }
}