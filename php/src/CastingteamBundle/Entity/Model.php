<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Template
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Model")
 * @ORM\Table(name="model")
 */
class Model
{
    /**
     * @var int
     *
     * @ORM\Column(name="model_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="naam", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="voornaam", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="geslacht", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", name="geboortedatum", length=255, nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="lengte", length=255, nullable=true)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="gewicht", length=255, nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="straat", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="nummer", length=127, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="provincie", length=255, nullable=true)
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="gemeente", length=255, nullable=true)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="postcode", length=255, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="beroep", length=127, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="telefoon", length=127, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="gsm", length=255, nullable=true)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="email", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="maten_schoenen", length=255, nullable=true)
     */
    private $shoeSize;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="maten_borst", length=255, nullable=true)
     */
    private $chestSize;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="maten_taille", length=255, nullable=true)
     */
    private $waistSize;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="maten_heupen", length=255, nullable=true)
     */
    private $hipsSize;

    /**
     * @var Group[]
     *
     * @ORM\ManyToMany(targetEntity="Group", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="model_groepen",
     *     joinColumns={@ORM\JoinColumn(name="id_model", referencedColumnName="model_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_groep", referencedColumnName="id")}
     * )
     */
    private $groups;

    /**
     * @var Image[]
     *
     * @ORM\OneToMany(targetEntity="Image", mappedBy="model", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @var SiteImage[]
     *
     * @ORM\OneToMany(targetEntity="SiteImage", mappedBy="model", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $siteImages;

    /**
     * @var Video[]
     *
     * @ORM\OneToMany(targetEntity="Video", mappedBy="model", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $videos;

    /**
     * @var Selection[]
     *
     * @ORM\ManyToMany(targetEntity="Selection", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="selecties_models",
     *     joinColumns={@ORM\JoinColumn(name="id_model", referencedColumnName="model_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_selectie", referencedColumnName="id")}
     * )
     */
    private $selections;

    /**
     * @var Category[]
     *
     * @ORM\ManyToMany(targetEntity="Category", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="modelcategory",
     *     joinColumns={@ORM\JoinColumn(name="model_id", referencedColumnName="model_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="category_id")}
     * )
     */
    private $categories;

    /**
     * @var Keyword[]
     *
     * @ORM\OneToMany(targetEntity="Keyword", mappedBy="model", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $keywords;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Model
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return Model
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Model
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     * @return Model
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $length
     * @return Model
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return Model
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Model
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Model
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     * @return Model
     */
    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string $town
     * @return Model
     */
    public function setTown($town)
    {
        $this->town = $town;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     * @return Model
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Model
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Model
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * @param string $gsm
     * @return Model
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Model
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getShoeSize()
    {
        return $this->shoeSize;
    }

    /**
     * @param string $shoeSize
     * @return Model
     */
    public function setShoeSize($shoeSize)
    {
        $this->shoeSize = $shoeSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getChestSize()
    {
        return $this->chestSize;
    }

    /**
     * @param string $chestSize
     * @return Model
     */
    public function setChestSize($chestSize)
    {
        $this->chestSize = $chestSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getWaistSize()
    {
        return $this->waistSize;
    }

    /**
     * @param string $waistSize
     * @return Model
     */
    public function setWaistSize($waistSize)
    {
        $this->waistSize = $waistSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getHipsSize()
    {
        return $this->hipsSize;
    }

    /**
     * @param string $hipsSize
     * @return Model
     */
    public function setHipsSize($hipsSize)
    {
        $this->hipsSize = $hipsSize;
        return $this;
    }

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Group[] $groups
     * @return Model
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     * @return Model
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return SiteImage[]
     */
    public function getSiteImages()
    {
        return $this->siteImages;
    }

    /**
     * @param SiteImage[] $siteImages
     * @return Model
     */
    public function setSiteImages($siteImages)
    {
        $this->siteImages = $siteImages;
        return $this;
    }

    /**
     * @return Video[]
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param Video[] $videos
     * @return Model
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;
        return $this;
    }

    /**
     * @return Selection[]
     */
    public function getSelections()
    {
        return $this->selections;
    }

    /**
     * @param Selection[] $selections
     * @return Model
     */
    public function setSelections($selections)
    {
        $this->selections = $selections;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return Model
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return Keyword[]
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param Keyword[] $keywords
     * @return Model
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }
}