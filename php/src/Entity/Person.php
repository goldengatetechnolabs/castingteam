<?php

abstract class Entity_Person extends Entity_BasePerson
{
    /**
     * @var int
     */
    protected $phone;

    /**
     * @var Enum_Country
     */
    protected $country;

    /**
     * @var int
     */
    protected $postal;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var int
     */
    protected $accepted;

    /**
     * @var DateTime
     */
    protected $updatedDate;

    /**
     * @var DateTime
     */
    protected $registrationDate;

    /**
     * @var Enum_UserType
     */
    protected $userType;

    /**
     * @var Enum_Language
     */
    protected $language;

    /**
     * Entity_Person constructor.
     */
    public function __construct()
    {
        $this->language = Enum_Language::create(Enum_Language::DEFAULT_LANGUAGE);
        $this->userType = Enum_UserType::create(Enum_UserType::NON_USER);
    }

    /**
     * @param int $id
     * @return Entity_Person
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Entity_Person
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Enum_Country $country
     * @return Entity_Person
     */
    public function setCountry(Enum_Country $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * @param int $postal
     * @return Entity_Person
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Entity_Person
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * @param int $accepted
     * @return Entity_Person
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;
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
     * @return Entity_Person
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * @param DateTime $updatedDate
     * @return Entity_Person
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * @return Enum_UserType
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param Enum_UserType $userType
     * @return Entity_Person
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return Enum_Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param Enum_Language $language
     * @return Entity_Person
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
