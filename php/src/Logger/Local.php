<?php

abstract class Logger_Local extends Core_Logger
{
    const LOG_PATH = Config_Log::LOG_PATH;

    /**
     * Logger_Local constructor.
     */
    public function __construct()
    {
        $this->initializeEnvironment();
    }

    /**
     * @inheritdoc
     */
    public function log($level, $message, $params)
    {
        file_put_contents(
            static::LOG_PATH . DIRECTORY_SEPARATOR . date("Y-m-d") . '.log',
            sprintf(
                '%s %s response: %s input: %s %s',
                date("Y-m-d H:i:s"),
                $level,
                $message,
                implode(',', $params),
                PHP_EOL
            ),
            FILE_APPEND
        );
    }

    protected function initializeEnvironment()
    {
        if (!is_dir(Config_Log::LOG_PATH)) {
            mkdir(Config_Log::LOG_PATH, 0777);
            chmod(Config_Log::LOG_PATH, 0777);
        }

        if (!is_dir(static::LOG_PATH)) {
            mkdir(static::LOG_PATH, 0777);
            chmod(static::LOG_PATH, 0777);
        }
    }
}
