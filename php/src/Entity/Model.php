<?php

class Entity_Model extends Entity_Person
{
    /**
     * @var Entity_Group[]
     */
    private $groups;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var DateTime
     */
    private $bornDate;

    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $shoeSize;

    /**
     * @var int
     */
    private $chest;

    /**
     * @var int
     */
    private $waist;

    /**
     * @var int
     */
    private $hips;

    /**
     * @var int
     */
    private $clothingSize;

    /**
     * @var int
     */
    private $jeans;

    /**
     * @var int
     */
    private $declined;

    /**
     * @var int
     */
    private $active;

    /**
     * @var string
     */
    private $secondPhone;

    /**
     * @var string
     */
    private $age;

    /**
     * @var Entity_Image[]
     */
    private $images = [];

    /**
     * @param null|int $id
     * @throws Entity_Exception_UserNotFound
     */
    public function __construct($id = null)
    {
        parent::__construct();

        $this->userType = Enum_UserType::create(Enum_UserType::MODEL);

        if (!is_null($id)) {
            $user = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `model` WHERE `model_id`=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (! is_array($user)) {
                throw new Entity_Exception_UserNotFound();
            }

            $this->id = $this->getValueOrElse($user, 'model_id', 0);
            $this->name = $this->getValueOrElse($user, 'voornaam', '');
            $this->surname = $this->getValueOrElse($user, 'naam', '');
            $this->password = $this->getValueOrElse($user, 'code', '');
            $this->email = $this->getValueOrElse($user, 'email', '');
            $this->phone = $this->getValueOrElse($user, 'telefoon', 0);
            $this->street = $this->getValueOrElse($user, 'straat', '');
            $this->postal = $this->getValueOrElse($user, 'postcode', '');
            $this->city = $this->getValueOrElse($user, 'gemeente', '');
            $this->length = $this->getValueOrElse($user, 'lengte', '');
            $this->weight = $this->getValueOrElse($user, 'gewicht', '');
            $this->gender = $this->getValueOrElse($user, 'geslacht', '');
            $this->bornDate = new DateTime($this->getValueOrElse($user, 'geboortedatum', ''));
            $this->shoeSize = $this->getValueOrElse($user, 'maten_schoenen', '');
            $this->chest = $this->getValueOrElse($user, 'maten_borst', '');
            $this->waist = $this->getValueOrElse($user, 'maten_taille', '');
            $this->hips = $this->getValueOrElse($user, 'maten_heupen', '');
            $this->clothingSize = $this->getValueOrElse($user, 'maten_kostuum', '');
            $this->jeans = $this->getValueOrElse($user, 'maten_jeans', '');
            $this->country = Enum_Country::create($this->getValueOrElse($user, 'land', ''));
            $this->registrationDate = new DateTime($this->getValueOrElse($user, 'datum', ''));
            $this->updatedDate = new DateTime($this->getValueOrElse($user, 'updated', ''));
            $this->accepted = $this->getValueOrElse($user, 'accepted', 0);
            $this->declined = $this->getValueOrElse($user, 'declined', 0);
            $this->active = $this->getValueOrElse($user, 'nieuw_actief', 0);
            $this->secondPhone = $this->getValueOrElse($user, 'nieuw_telefoon2', '');
            $this->age = $this->getValueOrElse($user, 'geslacht', '');
            $this->language = Enum_Language::create(
                $this->getValueOrElse(
                    $user,
                    'moedertaal',
                    Enum_Language::DEFAULT_LANGUAGE
                )
            );

            $images = $this->queryAssoc(
                sprintf(
                    'SELECT * FROM model_site_images WHERE id_model=%s AND online=1 ORDER BY volgorde ASC',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (count($images)) {
                $this->setImages(array_map(function (array $image) {
                    return new Entity_Image($image['id'], $this);
                }, $images));
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        // TODO: Implement remove() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        $this->query(
            strtr(
                'UPDATE `model` SET `email`=\'{email}\', `telefoon`=\'{phone}\' WHERE `model_id`=\'{modelId}\'',
                [
                    '{email}' => $this->getEmail(),
                    '{phone}' => $this->getPhone(),
                    '{modelId}' => $this->getId(),
                ]
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param Entity_Group $group
     * @return $this
     */
    public function addGroup(Entity_Group $group)
    {
        $this->groups[$group->getId()] = $group;
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
     * @return Entity_Model
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getBornDate()
    {
        return $this->bornDate;
    }

    /**
     * @param DateTime $bornDate
     * @return Entity_Model
     */
    public function setBornDate($bornDate)
    {
        $this->bornDate = $bornDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return Entity_Model
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return Entity_Model
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getShoeSize()
    {
        return $this->shoeSize;
    }

    /**
     * @return int
     */
    public function getChest()
    {
        return $this->chest;
    }

    /**
     * @param int $chest
     * @return Entity_Model
     */
    public function setChest($chest)
    {
        $this->chest = $chest;
        return $this;
    }

    /**
     * @return int
     */
    public function getWaist()
    {
        return $this->waist;
    }

    /**
     * @param int $waist
     * @return Entity_Model
     */
    public function setWaist($waist)
    {
        $this->waist = $waist;
        return $this;
    }

    /**
     * @return int
     */
    public function getHips()
    {
        return $this->hips;
    }

    /**
     * @param int $hips
     * @return Entity_Model
     */
    public function setHips($hips)
    {
        $this->hips = $hips;
        return $this;
    }

    /**
     * @return int
     */
    public function getClothingSize()
    {
        return $this->clothingSize;
    }

    /**
     * @param int $clothingSize
     * @return Entity_Model
     */
    public function setClothingSize($clothingSize)
    {
        $this->clothingSize = $clothingSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getJeans()
    {
        return $this->jeans;
    }

    /**
     * @param int $jeans
     * @return Entity_Model
     */
    public function setJeans($jeans)
    {
        $this->jeans = $jeans;
        return $this;
    }

    /**
     * @param int $shoeSize
     * @return Entity_Model
     */
    public function setShoeSize($shoeSize)
    {
        $this->shoeSize = $shoeSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeclined()
    {
        return $this->declined;
    }

    /**
     * @param int $declined
     * @return Entity_Model
     */
    public function setDeclined($declined)
    {
        $this->declined = $declined;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return Entity_Model
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return
            $this->getDeclined() == 0 &&
            $this->getAccepted() == 1 &&
            $this->getActive() > 0;
    }

    /**
     * @return string
     */
    public function getSecondPhone()
    {
        return $this->secondPhone;
    }

    /**
     * @param string $secondPhone
     * @return Entity_Model
     */
    public function setSecondPhone($secondPhone)
    {
        $this->secondPhone = $secondPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $age
     * @return Entity_Model
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return Entity_Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Entity_Group[] $groups
     * @return Entity_Model
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return Entity_Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Entity_Image[] $images
     * @return Entity_Model
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return Entity_Image[]
     */
    public function getBigImages()
    {
        $images = [];

        foreach ($this->images as $image) {
            if (!is_null($image->getLinkBig())) {
                $images[] = $image;
            }
        }

        return $images;
    }

    /**
     * @return string[]
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}
