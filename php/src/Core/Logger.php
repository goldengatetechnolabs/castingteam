<?php

abstract class Core_Logger
{
    const LEVELS = [
        LOG_DEBUG => 'debug',
        LOG_INFO => 'info',
        LOG_NOTICE => 'notice',
        LOG_WARNING => 'warning',
        LOG_ERR => 'error',
        LOG_CRIT => 'critical',
        LOG_ALERT => 'alert',
        LOG_EMERG => 'emergency',
    ];

    public static function create()
    {
        return new static();
    }

    /**
     * Logs a debug message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function debug($message, $params)
    {
        return $this->log(LOG_DEBUG, $message, $params);
    }

    /**
     * Logs an info message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function info($message, $params)
    {
        return $this->log(LOG_INFO, $message, $params);
    }

    /**
     * Logs a notice message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function notice($message, $params)
    {
        return $this->log(LOG_NOTICE, $message, $params);
    }

    /**
     * Logs a warning message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function warning($message, $params)
    {
        return $this->log(LOG_WARNING, $message, $params);
    }

    /**
     * Logs an error message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function error($message, $params)
    {
        return $this->log(LOG_ERR, $message, $params);
    }

    /**
     * Logs a critical message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function critical($message, $params)
    {
        return $this->log(LOG_CRIT, $message, $params);
    }

    /**
     * Logs an alert message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function alert($message, $params)
    {
        return $this->log(LOG_ALERT, $message, $params);
    }

    /**
     * Logs an emergency message
     *
     * @param string $message
     * @return Core_Logger
     */
    public function emergency($message, $params)
    {
        return $this->log(LOG_EMERG, $message, $params);
    }

    /**
     * Logs a message with a given level
     *
     * @param integer $level
     * @param string $message
     * @return Core_Logger
     */
    abstract public function log($level, $message, $params);
}