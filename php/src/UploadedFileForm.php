<?php


class UploadedFileForm extends Core_UploadedFile
{
    /**
     * @param string $path
     * @return bool
     */
    public function save($path)
    {
        return move_uploaded_file($this->path, $path);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
