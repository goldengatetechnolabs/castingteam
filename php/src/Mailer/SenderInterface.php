<?php

interface Mailer_SenderInterface
{
    /**
     * @param Entity_Person $person
     * @param Entity_Email $email
     * @param string[] $params
     */
    public function send(Entity_Person $person, Entity_Email $email, array $params);
}
