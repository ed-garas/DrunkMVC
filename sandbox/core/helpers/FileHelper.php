<?php

class FileHelper
{

    public static function fileCopy($inputName, $uploadDir, $fileToUpload = false)
    {
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $uploadDir;

        if (!empty($_FILES)) {
            $file_post = $_FILES[$inputName];
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            $file_ary = array();
            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            foreach ($file_ary as $file) {
                if($fileToUpload){
                    move_uploaded_file($file['tmp_name'], $uploadDirectory . DIRECTORY_SEPARATOR . $fileToUpload);
                } else {
                    $name = $file['name'];
                    move_uploaded_file($file['tmp_name'], $uploadDirectory . DIRECTORY_SEPARATOR . $name);
                }
            }
        }
    }

    public static function fileExists($directory, $file)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;
        $fullPath = $path . $file;
        return file_exists($fullPath) ? $file : false;
    }

    public static function fileDelete($directory, $file)
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $file;
        if (self::fileExists($directory, $file)) {
            unlink($filePath);
        }
    }
}