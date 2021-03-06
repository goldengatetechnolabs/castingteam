<?php
/**
* Class that encapsulates the file-upload internals
*/
class FileUploader
{
    private $allowedExtensions;
    private $sizeLimit;
    private $file;
    private $uploadName;

    /**
     * @param Core_UploadedFile $file
     * @param array $allowedExtensions; defaults to an empty array
     * @param int $sizeLimit; defaults to the server's upload_max_filesize setting
     */
    function __construct(Core_UploadedFile $file, array $allowedExtensions = null, $sizeLimit = null)
    {
        if ($allowedExtensions === null) {
            $allowedExtensions = [];
        }

        if ($sizeLimit === null) {
            $sizeLimit = $this->toBytes(ini_get('upload_max_filesize'));
        }

        $allowedExtensions = array_map("strtolower", $allowedExtensions);
        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;
        $this->checkServerSettings();
        $this->file = $file;
    }

    /**
    * Get the name of the uploaded file
    * @return string
    */
    public function getUploadName()
    {
        if (isset($this->uploadName)) {
            return $this->uploadName;
        }
    }

    /**
    * Get the original filename
    * @return string filename
    */
    public function getName()
    {
        if ($this->file) {
            return $this->file->getName();
        }
    }

    /**
    * Internal function that checks if server's may sizes match the
    * object's maximum size for uploads
    */
    private function checkServerSettings()
    {
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit) {
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            die(json_encode(['error'=>'increase post_max_size and upload_max_filesize to ' . $size]));
        }
    }

    /**
     * Convert a given size with units to bytes
     * @param string $str
     * @return int|string
     */
    private function toBytes($str)
    {
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);

        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;
        }

        return $val;
    }

    /**
    * Handle the uploaded file
    * @param string $uploadDirectory
    * @param string $replaceOldFile=true
    * @returns array('success'=>true) or array('error'=>'error message')
    */
    function handleUpload($uploadDirectory, $replaceOldFile = false)
    {
        if (! is_writable($uploadDirectory)) {
            return ['error' => "Server error. Upload directory isn't writable."];
        }

        if (!$this->file) {
            return ['error' => 'No files were uploaded.'];
        }

        $size = $this->file->getSize();

        if ($size == 0) {
            return ['error' => 'File is empty'];
        }

        if ($size > $this->sizeLimit) {
            return ['error' => 'File is too large'];
        }

        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        $ext = $pathinfo['extension'];

        if ($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)) {
            $these = implode(', ', $this->allowedExtensions);

            return ['error' => 'Je probeert een ongeldig bestand te uploaden, je kan enkel deze bestanden toevoegen: '. $these . '.'];
        }

        $ext = ($ext == '') ? $ext : '.' . $ext;
        
        if (! $replaceOldFile) {
            while (file_exists($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)) {
                $filename .= rand(10, 99);
            }
        }

        $this->uploadName = $filename . $ext;

        if ($this->file->save($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)) {
            return ['success' => true];
        } else {
            return ['error' => 'Could not save uploaded file.' . 'The upload was cancelled, or server error encountered'];
        }
    }
}