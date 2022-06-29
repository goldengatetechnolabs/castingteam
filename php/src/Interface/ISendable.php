<?php

interface Interface_ISendable
{
    /**
     * @param string $destination
     * @param string $message
     * @return mixed
     */
    public function send($destination, $message);
}