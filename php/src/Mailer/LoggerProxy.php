<?php

class Mailer_LoggerProxy implements Mailer_SenderInterface
{
    /**
     * @var Mailer_SenderInterface
     */
    private $sender;

    /**
     * @var Entity_Log
     */
    private $logger;

    /**
     * Mailer_LoggerProxy constructor.
     * @param Mailer_SenderInterface $sender
     */
    public function __construct(Mailer_SenderInterface $sender)
    {
        $this->sender = $sender;
        $this->logger = new Entity_Log();
    }

    /**
     * {@inheritdoc}
     */
    public function send(Entity_Person $person, Entity_Email $email, array $params)
    {
        $this->sender->send($person, $email, $params);

        $this->logger
            ->setPerson($person)
            ->setEmail($email)
            ->create()
        ;
    }
}
