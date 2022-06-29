<?php

class Entity_AccessLog extends Core_Entity
{
    /**
     * @var Entity_BasePerson
     */
    private $person;

    /**
     * @var string
     */
    private $message;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @param int|null $id
     * @throws Entity_Exception_LogNotFound
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $log = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `_log` WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (!is_array($log)) {
                throw new Entity_Exception_LogNotFound();
            }

            $this->id = $this->getValueOrElse($log, 'id', 0);
            $this->message = $this->getValueOrElse($log, 'bericht', '');
            $this->date = new DateTime($this->getValueOrElse($log, 'timestamp', ''));
            $this->person = new Entity_Admin($this->getValueOrElse($log, 'id_model', ''));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->query(
            sprintf(
                'INSERT INTO _log (id_model, timestamp, bericht, user_type_id) VALUES(\'%s\', now(), \'%s\', \'%s\')',
                $this->getPerson()->getId(),
                $this->getMessage(),
                $this->getPerson()->getType()->getValue()
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
                'UPDATE _log SET id_model=\'%s\', timestamp=\'%s\', bericht=\'%s\', user_type_id=\'%s\'',
                $this->getPerson()->getId(),
                $this->getDate(),
                $this->getMessage(),
                $this->getPerson()->getType()->getValue()
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        $this->query(sprintf('DELETE FROM _log WHERE id=\'%s\'', $this->getId()));
    }

    /**
     * @return Entity_BasePerson
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Entity_BasePerson $person
     * @return Entity_AccessLog
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Entity_AccessLog
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
     * @return Entity_AccessLog
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string[]
     */
    public function toArray()
    {
        return [
            'person' => $this->person->toArray(),
            'message' => $this->message,
            'date' => $this->date->format('Y-m-d H:i:s'),
        ];
    }
}
