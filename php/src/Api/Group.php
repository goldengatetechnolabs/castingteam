<?php

class Api_Group extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function add(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $groupId = $this->getController()->createGroup(
                [
                    'name' => $this->getValueOrThrowException(
                        $request->getPost(),
                        'name'
                    )
                ]
            );

            $this->getController()->addGroupToRoot(
                [
                    'category_id' => $this->getValueOrThrowException(
                        $request->getPost(),
                        'root_id'
                    ),
                    'group_id' => $groupId,
                ]
            );

            return new Http_Response(
                json_encode(
                    [
                        'error' => false,
                        'data' =>
                            [
                                'root_id' => $this->getValueOrThrowException($request->getPost(), 'root_id'),
                                'group_id' => $groupId,
                            ]
                    ]
                )
            );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function edit(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $groupId = $this->getValueOrThrowException($request->getPost(), 'group_id');
            $group = new Entity_Group($groupId);
            $group->setName($this->getValueOrThrowException($request->getPost(), 'name'))->update();

            return new Http_Response(
                json_encode(
                    [
                        'error' => false,
                        'data' =>
                            [
                                'root_id' => $group->getCategory()->getId(),
                                'group_id' => $group->getId(),
                            ]
                    ]
                )
            );
        }

        throw new Exception_Security();
    }
}