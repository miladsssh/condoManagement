<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/10/15
 * Time: 7:52 PM
 */

namespace Cygnus\Commands\Upload;


class UploadSaveCommand {


    public $filePath;

    public $fileNewName;

    public $fileRefId;

    public function __construct($filePath, $fileNewName, $fileRefId)
    {
        $this->filePath = $filePath;
        $this->fileNewName = $fileNewName;
        $this->fileRefId = $fileRefId;
    }

}