<?php

class UploadHelper
{
    static private $uploadDir;
    static private $file;
    static private $fileName;
    static private $fileSize = 10000000;
    static private $filePermissions = 0644;

    static private function getFile()
    {
        return self::$file = $_FILES["media"];
    }

    static private function getFileName()
    {
        return self::$fileName = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES["media"]["name"]);
    }

    static private function chmodFile(){
        chmod(self::$uploadDir . self::$fileName, self::$filePermissions);
    }

    static private function fileSize(){
        if (self::getFile()['size'] > self::$fileSize) {
            throw new DrunkException('Exceeded filesize limit.');
        }
    }

    static private function isFileGood(){
        try{
            if (!isset(self::getFile()['error']) || is_array(self::getFile()['error'])
            ) {
                throw new DrunkException('Invalid parameters.');
            }
            switch (self::getFile()['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new DrunkException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new DrunkException('Exceeded filesize limit.');
                default:
                    throw new DrunkException('Unknown errors.');
            }

            self::fileSize();
        }catch (DrunkException $e){
            echo $e->getMessage();
        }
    }

    static public function uploadFile($directory){
        self::$uploadDir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR;
        self::isFileGood();

        $i = 0;
        $name = self::getFileName();
        $parts = pathinfo($name);
        while (file_exists(self::$uploadDir . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }

        $success = move_uploaded_file($_FILES["media"]["tmp_name"], self::$uploadDir . $name);
        if (!$success) {
            echo "<p>Unable to save file.</p>";
            exit;
        }
        self::chmodFile();
    }

    static public function getMedia($directory, $fileName){
        $file = UrlHelper::getBaseUrl().$directory.DIRECTORY_SEPARATOR.$fileName;
        return $file;
    }

}