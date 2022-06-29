<?php

class UploadedFilesHandler
{
    /**
     * @var mixed[]
     */
    private $files;

    /**
     * UploadedFilesHandler constructor.
     */
    public function __construct()
    {
        foreach ($_FILES['images']['name'] as $key => $file) {
            $this->files[] = new UploadedFileForm($_FILES['images']['tmp_name'][$key], $_FILES['images']['name'][$key], $_FILES['images']['size'][$key]);
        }
    }

    /**
     * @return mixed[]
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @return UploadedFilesHandler
     */
    public static function create()
    {
        return new static();
    }
}