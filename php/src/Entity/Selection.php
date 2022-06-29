<?php

class Entity_Selection extends Core_Entity
{
    /**
     * @var Entity_Model[]
     */
    private $models;

    /**
     * @var Entity_User
     */
    private $user;

    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var Enum_SelectionType
     */
    private $type;

    /**
     * @var string
     */
    private $code;

    /**
     * @param int $id
     * @throws Entity_Exception_SelectionNotFound
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $selection = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `selecties` WHERE `id`=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (!is_array($selection)) {
                throw new Entity_Exception_SelectionNotFound();
            }

            $this->id = $this->getValueOrElse($selection, 'id', '');
            $this->name = $this->getValueOrElse($selection, 'name', '');
            $this->code = $this->getValueOrElse($selection, 'code', '');
            $this->date = new DateTime($this->getValueOrElse($selection, 'creation_date', ''));
            $this->type = Enum_SelectionType::create($this->getValueOrElse($selection, 'selection_type', ''));
            $this->models = $this->getSelectionModels();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param Entity_Model $model
     * @return Entity_Selection
     */
    public function addModel(Entity_Model $model)
    {
        $this->models[$model->getId()] = $model;
        return $this;
    }

    /**
     * @return Entity_Model[]
     */
    public function getModels()
    {
        return $this->models;
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
     * @return Entity_Selection
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Entity_Selection
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Enum_SelectionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Enum_SelectionType $type
     * @return Entity_Selection
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Entity_Selection
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return Entity_Model[]
     */
    private function getSelectionModels()
    {
        $models = $this->queryAssoc(
            sprintf(
                'SELECT * FROM `selecties_models` WHERE `id_selectie`=\'%s\'',
                filter_var($this->id, FILTER_VALIDATE_INT)
            )
        );

        foreach ($models as $model) {
            $result[] = new Entity_Model($this->getValueOrThrowException($model, 'id_model'));
        }

        return !empty($result) ? $result : [];
    }
}
