<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteImage
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\SiteImage")
 * @ORM\Table(name="model_site_images")
 */
class SiteImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Model
     *
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumn(name="id_model", referencedColumnName="model_id", nullable=false)
     */
    private $model;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="volgorde", length=11, nullable=false)
     */
    private $order;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="online", length=4, nullable=false)
     */
    private $online;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="pdf", length=4, nullable=false)
     */
    private $pdf;

    /**
     * @var SiteImageGroup[]
     *
     * @ORM\OneToMany(targetEntity="SiteImageGroup", mappedBy="siteImage")
     *
     */
    private $siteImageGroups = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SiteImage
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     * @return SiteImage
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return SiteImage
     */
    public function setOrder($order)
    {
        $this->order = $order;
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
     * @return SiteImage
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
     * @return SiteImage
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }

    /**
     * @return SiteImageGroup[]
     */
    public function getSiteImageGroups()
    {
        return $this->siteImageGroups;
    }

    /**
     * @param SiteImageGroup[] $siteImageGroups
     * @return SiteImage
     */
    public function setSiteImageGroups($siteImageGroups)
    {
        $this->siteImageGroups = $siteImageGroups;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageLocation() {
        $thumb_url = "models/" . $this->getModel()->getId() . "/website/thumbs/" . $this->getId() . ".jpg";
        if (file_exists($thumb_url)) {
            return '';
        }
        else if ($this->checkExternalImage($thumb_url)) {
            return EXTERNAL_IMAGES_SRC;
        }
    }

    /**
     * @param $url
     * @return bool
     */
    public function checkExternalImage($url){
        $ch = curl_init(EXTERNAL_IMAGES_SRC . '/' . $url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $retCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $retCode === 200;
    }
}