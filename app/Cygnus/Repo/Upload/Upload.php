<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/10/15
 * Time: 7:45 PM
 */
namespace Cygnus\Repo\Upload;

use Eloquent;

class Upload extends Eloquent{

    protected  $fillable = ['file_path','file_real_name','file_reference_id'];

    protected $table = 'uploads';

    public static function register($file_path, $file_real_name, $file_reference_id) {
        $upload = new static(compact('file_path','file_real_name', 'file_reference_id'));
        return $upload;
        //raise event
    }

    
}