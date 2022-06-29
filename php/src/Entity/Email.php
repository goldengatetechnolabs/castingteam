<?php

class Entity_Email extends Core_Entity
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string[]
     */
    private $subject;

    /**
     * @var string[]
     */
    private $content;

    /**
     * @param null|int $id
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $entity = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `emails` WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            $this->id = $entity['id'];
            $this->title = $entity['titel'];
            $this->code = $entity['nice_name'];

            $mailContents = $this->queryAssoc(
                sprintf(
                    'SELECT * FROM `email_content` WHERE mail_id=\'%s\'',
                    $this->id
                )
            );

            foreach ($mailContents as $mailContent) {
                $this->subject[$mailContent['language_code']] = $mailContent['subject'];
                $this->content[$mailContent['language_code']] = $mailContent['content'];
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->query(
            sprintf(
                'INSERT INTO `emails` (`titel`, `nice_name`) VALUES (\'%s\', \'%s\')',
                $this->title,
                $this->code
            )
        );

        $this->id = $this->getDB()->insert_id;

        foreach ($this->content as $key => $content) {
            $this->addContent($this->getValueOrThrowException($this->subject, $key), $content, $key);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        $this->query(
            sprintf(
                'UPDATE `emails` SET `titel`=\'%s\' WHERE id=\'%s\'',
                $this->title,
                $this->id
            )
        );

        foreach ($this->content as $key => $content) {
            if ($this->isContentExists($key)) {
                $this->updateContent($this->getValueOrThrowException($this->subject, $key), $content, $key);
            } else {
                $this->addContent($this->getValueOrThrowException($this->subject, $key), $content, $key);
            }
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        $this->query(
            sprintf(
                'DELETE FROM `emails` WHERE id=\'%s\'',
                $this->id
            )
        );

        $this->query(
            sprintf(
                'DELETE FROM `email_content` WHERE mail_id=\'%s\'',
                $this->id
            )
        );

        return $this;
    }

    /**
     * @param string $title
     * @return Entity_Email
     */
    public function setTitle($title)
    {
        $this->title = $this->getDB()->real_escape_string($title);

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $code
     * @return Entity_Email
     */
    public function setCode($code)
    {
        $this->code = $this->getDB()->real_escape_string($code);

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
     * @param $subject
     * @param Enum_Language $language
     * @return Entity_Email
     */
    public function setSubject($subject, Enum_Language $language)
    {
        $this->subject[$language->getValue()] = $this->getDB()->real_escape_string($subject);

        return $this;
    }

    /**
     * @param Enum_Language $language|null
     * @return string
     */
    public function getSubject($language = null)
    {
        return
            !is_null($language)
                ? $this->getValueOrElse(
                    $this->subject,
                    $language->getValue(),
                    ''
                )
                : $this->subject;
    }

    /**
     * @param string $content
     * @param Enum_Language $language
     * @return Entity_Email
     */
    public function setContent($content, Enum_Language $language)
    {
        $this->content[$language->getValue()] = $this->getDB()->real_escape_string($content);

        return $this;
    }

    /**
     * @param Enum_Language|null $language
     * @return string
     */
    public function getContent($language = null)
    {
        return
            !is_null($language)
                ? $this->getValueOrElse(
                    $this->content,
                    $language->getValue(),
                    ''
                )
                : $this->content;
    }

    /**
     * @return mixed[]
     */
    public function toArray()
    {
        return
            [
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'code' => $this->getCode(),
                'subject' => $this->getSubject(),
                'content' => $this->getContent(),
            ];
    }

    /**
     * @param string $language
     * @return bool
     */
    public function isContentExists($language)
    {
        $result = $this->queryAssoc(
            sprintf(
                'SELECT * FROM `email_content` WHERE  `language_code`=\'%s\' AND `mail_id`=\'%s\'',
                $language,
                $this->id
            )
        );

        return !empty($result) ? true : false;
    }

    /**
     * @param string $subject
     * @param string $content
     * @param string $language
     */
    private function updateContent($subject, $content, $language)
    {
        $this->query(
            sprintf(
                'UPDATE `email_content` SET `subject`=\'%s\', `content`=\'%s\' WHERE mail_id=\'%s\' AND language_code=\'%s\'',
                $subject,
                $content,
                $this->id,
                $language
            )
        );
    }

    /**
     * @param string $subject
     * @param string $content
     * @param string $language
     */
    private function addContent($subject, $content, $language)
    {
        if (
            !empty($subject) ||
            !empty($content)
        ) {
            $this->query(
                sprintf(
                    'INSERT INTO `email_content` (`language_code`, `subject`,`content`,`mail_id`) VALUES (\'%s\', \'%s\', \'%s\', \'%s\')',
                    $language,
                    $subject,
                    $content,
                    $this->id
                )
            );
        }
    }
}