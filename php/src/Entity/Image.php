<?php

class Entity_Image extends Core_Entity
{
    const MOCK_TEMPLATE = '%s/%s/%s.jpg';

    const LINK_TEMPLATE = 'models/%s/website/%s/%s.jpg';

    const LINK_WATERMARK = 'models/%s/website/%s/%s_watermark.jpg';

    /**
     * @var Entity_Model
     */
    private $model;

    /**
     * @var int
     */
    private $order;

    /**
     * @var int
     */
    private $online;

    /**
     * @var int
     */
    private $pdf;

    /**
     * @var string
     */
    private $linkBig;

    /**
     * @var string
     */
    private $linkSmall;

    /**
     * @var string
     */
    private $linkWatermark;

    /**
     * @var string
     */
    private $linkWeb;

    /**
     * @param string|null $id
     * @param Entity_Model|null $model
     * @throws Entity_Exception_ImageNotFound
     */
    public function __construct($id = null, Entity_Model $model = null)
    {
        if (!is_null($id)) {
            $entity = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `model_site_images` WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (! is_array($entity)) {
                throw new Entity_Exception_ImageNotFound();
            }

            $this->setId($this->getValueOrThrowException($entity, 'id'));

            if (is_null($model)) {
                $this->setModel(new Entity_Model($this->getValueOrThrowException($entity, 'id_model')));
            } else {
                $this->setModel($model);
            }

            $this->setOrder($this->getValueOrElse($entity, 'volgorde', 0));
            $this->setOnline($this->getValueOrElse($entity, 'online', 1));
            $this->setPdf($this->getValueOrElse($entity, 'pdf', 1));

            $this->setLinkBig($this->checkIfExistsAndGetLink('middle', self::LINK_TEMPLATE));
            $this->setLinkWatermark($this->checkIfExistsAndGetLink('middle', self::LINK_WATERMARK));
            $this->setLinkSmall($this->checkIfExistsAndGetLink('thumbs', self::LINK_TEMPLATE));
            $this->setLinkWeb($this->checkIfExistsAndGetLink('middle', self::MOCK_TEMPLATE));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->query(
            strtr(
                'INSERT INTO model_site_images (id_model, volgorde, pdf, online) VALUES ({modelId}, {order}, {online}, {pdf})',
                [
                    '{modelId}' => $this->getModel()->getId(),
                    '{order}' => $this->getOrder(),
                    '{online}' => $this->getOnline(),
                    '{pdf}' => $this->getPdf(),
                ]
            )
        );

        $this->setId($this->db->insert_id);
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        $this->query(
            strtr(
                'UPDATE model_site_images SET id_model={modelId}, volgorde={order}, online={online}, pdf={pdf} WHERE id={id}',
                [
                    '{id}' => $this->getId(),
                    '{modelId}' => $this->getModel()->getId(),
                    '{order}' => $this->getOrder(),
                    '{online}' => $this->getOnline(),
                    '{pdf}' => $this->getPdf(),
                ]
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        $this->query(
            strtr(
                'DELETE FROM model_site_images WHERE id={id}',
                [
                    '{id}' => $this->getId(),
                ]
            )
        );
    }

    /**
     * @return Entity_Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Entity_Model $model
     * @return Entity_Image
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
     * @return Entity_Image
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
     * @return Entity_Image
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
     * @return Entity_Image
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkBig()
    {
        return $this->linkBig;
    }

    /**
     * @param string $linkBig
     * @return Entity_Image
     */
    public function setLinkBig($linkBig)
    {
        $this->linkBig = $linkBig;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkSmall()
    {
        return $this->linkSmall;
    }

    /**
     * @param string $linkSmall
     * @return Entity_Image
     */
    public function setLinkSmall($linkSmall)
    {
        $this->linkSmall = $linkSmall;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkWatermark()
    {
        return $this->linkWatermark;
    }

    /**
     * @param string $linkWatermark
     * @return Entity_Image
     */
    public function setLinkWatermark($linkWatermark)
    {
        $this->linkWatermark = $linkWatermark;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkWeb()
    {
        return $this->linkWeb;
    }

    /**
     * @param string $linkWeb
     * @return Entity_Image
     */
    public function setLinkWeb($linkWeb)
    {
        $this->linkWeb = $linkWeb;
        return $this;
    }

    /**
     * @param string $type
     * @param string $linkTemplate
     * @return null|string
     */
    private function checkIfExistsAndGetLink($type, $linkTemplate)
    {
        if (file_exists(sprintf($linkTemplate, $this->getModel()->getId(), $type, $this->getId()))) {
            return sprintf($linkTemplate, $this->getModel()->getId(), $type, $this->getId());
        }

        return null;
    }
}