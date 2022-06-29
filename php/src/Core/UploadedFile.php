<?php

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
abstract class Core_UploadedFile
{
    protected $path;
    protected $filename;
    protected $size;
    
    public function __construct($path, $filename, $size)
    {
        $this->path = $path;
        $this->filename = $filename;
        $this->size = $size;
    }

    /**
     * Save the file to the specified path
     * @param string $path new file path
     * @return boolean TRUE on success
     */
    abstract public function save($path);

    /**
     * Get the original filename
     * @return string filename
     */
    abstract public function getName();

    /**
     * Get the file size
     * @return integer file-size in byte
     */
    abstract public function getSize();

    /**
     * Get the file path
     * @return string filepath
     */
    abstract public function getPath();
}
