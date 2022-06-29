<?php

use CastingteamBundle\Entity;

class Api_Template extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_DataNotFound
     */
    public function add(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $id = $this->getValueOrElse($request->getPost(), 'id', null);

            if ($id) {
                $entity = $this->entityFactory->template()->findOneById($id);

                if ($entity) {
                    /** @var Entity\Template $entity */
                    $entity
                        ->setContent($this->getValueOrThrowException($request->getPost(), 'content'))
                        ->setKeyword($this->getValueOrThrowException($request->getPost(), 'keyword'))
                    ;
                } else {
                    throw new Exception_DataNotFound('Entity not found');
                }
            } else {
                $entity = (new Entity\Template())
                    ->setContent($this->getValueOrThrowException($request->getPost(), 'content'))
                    ->setKeyword($this->getValueOrThrowException($request->getPost(), 'keyword'))
                ;

                $this->entityManager->persist($entity);
            }

            $this->entityManager->flush();
        } else {
            throw new Exception_Security();
        }

        return
            new Http_JsonResponse(
                [
                    'error' => false,
                    'message' => 'Entity added'
                ]
            );
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function remove(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $id = $this->getValueOrThrowException($request->getPost(), 'id');

            $entity = $this->entityFactory->template()->findOneById($id);

            if ($entity) {
                $this->entityManager->remove($entity);
                $this->entityManager->flush();
            }
        } else {
            throw new Exception_Security();
        }

        return
            new Http_JsonResponse(
                [
                    'error' => false,
                    'message' => 'Entity removed'
                ]
            );
    }
}
