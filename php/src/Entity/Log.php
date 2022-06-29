<?php

class Entity_Log extends Core_Entity
{
    /**
     * @var Entity_Person
     */
    private $person;

    /**
     * @var Entity_Email
     */
    private $email;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->query(
            sprintf(
                'INSERT INTO model_mails (id_model, timestamp, html, title, user_type_id) VALUES(\'%s\', now(), \'no log\', \'%s\', \'%s\')',
                $this->getPerson()->getId(),
                $this->getEmail()->getTitle(),
                $this->getPerson()->getUserType()->getValue()
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        $this->query(
            sprintf(
                'UPDATE model_mails SET id_model=\'%s\', timestamp=\'%s\', html=\'no log\', title=\'%s\', user_type_id=\'%s\'',
                $this->getPerson()->getId(),
                $this->getDate(),
                $this->getEmail()->getTitle(),
                $this->getPerson()->getUserType()->getValue()
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        $this->query(sprintf('DELETE FROM model_mails WHERE id=\'%s\'', $this->getId()));
    }

    /**
     * @return Entity_Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Entity_Person $person
     * @return Entity_Log
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return Entity_Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Entity_Email $email
     * @return Entity_Log
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Entity_Log
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}
