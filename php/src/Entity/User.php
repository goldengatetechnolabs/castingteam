<?php

class Entity_User extends Entity_Person
{
    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $remark;

    /**
     * @var string
     */
    private $sector;
    /**
     * @param int $id
     */

    /**
     * @var Entity_Selection[]
     */
    private $selections;

    /**
     * @param null|int $id
     * @throws Entity_Exception_UserNotFound
     */
    public function __construct($id = null)
    {
        parent::__construct();

        $this->userType = Enum_UserType::create(Enum_UserType::USER);

        if (! is_null($id)) {
            $user = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM user WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (! is_array($user)) {
                throw new Entity_Exception_UserNotFound();
            }

            $this->id = $this->getValueOrElse($user, 'id', 0);
            $this->name = $this->getValueOrElse($user, 'name', '');
            $this->surname = $this->getValueOrElse($user, 'surname', '');
            $this->password = $this->getValueOrElse($user, 'password', '');
            $this->email = $this->getValueOrElse($user, 'email', '');
            $this->phone = $this->getValueOrElse($user, 'phone', 0);
            $this->company = $this->getValueOrElse($user, 'company', '');
            $this->sector = $this->getValueOrElse($user, 'sector', '');
            $this->street = $this->getValueOrElse($user, 'street', '');
            $this->postal = $this->getValueOrElse($user, 'postal_code', '');
            $this->city = $this->getValueOrElse($user, 'city', '');
            $this->country = $this->getValueOrElse($user, 'country', '');
            $this->remark = $this->getValueOrElse($user, 'remark', '');
            $this->registrationDate = new DateTime($this->getValueOrElse($user, 'registration_date', ''));
            $this->updatedDate = new DateTime($this->getValueOrElse($user, 'update_date', ''));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        $this->query(sprintf('DELETE FROM users WHERE id=\'%s\'', $this->id));

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return Entity_User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     * @return Entity_User
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * @return string
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * @param string $sector
     * @return Entity_User
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * @param Entity_Selection $selection
     * @return Entity_User
     */
    public function addSelection(Entity_Selection $selection)
    {
        $this->selections[$selection->getId()] = $selection;
        return $this;
    }

    /**
     * @param Entity_Selection $selection
     * @return Entity_User
     */
    public function removeSelection(Entity_Selection $selection)
    {
        return $this;
    }

    /**
     * @return Entity_Selection[]
     */
    public function getSelections()
    {
        return $this->selections;
    }

    /**
     * @return string[]
     */
    function toArray()
    {
        // TODO: Implement toArray() method.
    }
}
