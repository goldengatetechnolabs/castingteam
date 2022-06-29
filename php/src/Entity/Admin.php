<?php

class Entity_Admin extends Entity_BasePerson
{
    /**
     * @param null|int $id
     * @throws Entity_Exception_UserNotFound
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $user = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM users WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (!is_array($user)) {
                throw new Entity_Exception_UserNotFound();
            }

            $this->id = $this->getValueOrElse($user, 'id', 0);
            $this->name = $this->getValueOrElse($user, 'naam', '');
            $this->surname = $this->getValueOrElse($user, 'voornaam', '');
            $this->password = $this->getValueOrElse($user, 'wachtwoord', '');
            $this->email = $this->getValueOrElse($user, 'email', '');
            $this->type = Enum_UserType::create($this->getValueOrElse($user, 'type', ''));
        }
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return string[]
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'wachtwoord' => $this->getPassword(),
            'voornaam' => $this->getSurname(),
            'naam' => $this->getName(),
            'type' => $this->getType()->getValue(),
            'typeName' => $this->getType()->getLabel(),
        ];
    }
}