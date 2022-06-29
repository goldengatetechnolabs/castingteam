<?php

use CastingteamBundle\Entity\Repository\FactoryInterface;
use CastingteamBundle\Entity\Repository\Factory;
use CastingteamBundle\Entity\Template;

class Mailer_Sender implements Mailer_SenderInterface
{
    /**
     * @var Mailer_Postmark
     */
    private $protocol;

    /**
     * @var FactoryInterface
     */
    private $entityFactory;

    /**
     * @param string $reply
     */
    public function __construct($reply = EMAIL_REPLY)
    {
        $this->protocol = new Mailer_Postmark(EMAIL_API_KEY, $reply);
        $this->entityFactory = new Factory(Flight::get('entityManager'));
    }

    /**
     * {@inheritdoc}
     */
    public function send(Entity_Person $person, Entity_Email $email, array $params = [])
    {
        $content = $email->getContent($person->getLanguage());
        $subject = $email->getSubject($person->getLanguage());

        if (empty($content) || empty($subject)) {
            $content = $email->getContent(Enum_Language::create(Enum_Language::DEFAULT_LANGUAGE));
            $subject = $email->getSubject(Enum_Language::create(Enum_Language::DEFAULT_LANGUAGE));
        }

        foreach ($this->createShortCodeData($person, $params) as $key => $value) {
            $content = $this->render($content, $key, $value);
            $subject = $this->render($subject, $key, $value);
        }

        $this->protocol
            ->to($person->getEmail())
            ->subject($subject)
            ->html_message($content)
            ->send()
        ;
    }

    /**
     * @param Entity_Person $person
     * @param string[] $params
     * @return string[]
     */
    private function createShortCodeData(Entity_Person $person, array $params)
    {
        return
            array_merge(
                [
                    'user_name' => $person->getSurname(),
                    'user_firstname' => $person->getName(),
                    'model_email' => $person->getEmail(),
                    'model_code' => $person->getPassword(),
                    'model_id' => $person->getId(),
                    'model_link' => sprintf('castingteam.com/nl/people/%s', $person->getId()),
                    'current_date' => (new DateTime())->format('%A %e %B %Y'),
                ],
                $this->getDatabaseShortcodes(),
                $params
            );
    }

    /**
     * @param string $template
     * @param string $code
     * @param string $value
     * @return string
     */
    private function render($template, $code, $value)
    {
        return preg_replace('/' . $code . '/ui', $value, $template);
    }

    /**
     * @return string[]
     */
    private function getDatabaseShortcodes()
    {
        return
            array_reduce(
                $this->entityFactory->template()->findAll(),
                function($merged, Template $template) {
                    return
                        array_merge(
                            [$template->getKeyword() => $template->getContent()],
                            $merged
                        );
                },
                []
            );
    }
}
