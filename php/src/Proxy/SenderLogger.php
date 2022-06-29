<?php

class Proxy_SenderLogger implements Interface_ISendable
{
    /**
     * @var Core_Logger
     */
    private $_logger;

    /**
     * @var Interface_ISendable
     */
    private $_sender;

    /**
     * Proxy_SmsLogger constructor.
     * @param Interface_ISendable $sender
     * @param Core_Logger $logger
     */
    public  function __construct(Interface_ISendable $sender, Core_Logger $logger)
    {
        $this->_sender = $sender;
        $this->_logger = $logger;
    }

    /**
     * @param Interface_ISendable $sender
     * @param Core_Logger $logger
     * @return static
     */
    public static function create(Interface_ISendable $sender, Core_Logger $logger)
    {
        return new static($sender, $logger);
    }

    /**
     * @inheritdoc
     */
    public function send($destination, $message)
    {
        $response = $this->_sender->send($destination, $message);

        if ($response['error']) {
            $this->_logger->info($response['message'],['destination' => $destination, 'message' => $message]);
        } else {
            $this->_logger->error($response['message'],['destination' => $destination, 'message' => $message]);
        }

        return $response;
    }
}