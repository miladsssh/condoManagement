<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/10/15
 * Time: 7:47 PM
 */

namespace Cygnus\Repo\Upload;


class UploadRepo {

    public function save(Upload $upload)
    {
        return $upload->save();
    }

}