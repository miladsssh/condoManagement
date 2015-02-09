<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/8/15
 * Time: 5:46 PM
 */



class HelperController extends BaseController{

    public function uploadFile(){
        if ( Input::hasFile('file') ) {
            $fileName = Str::random(10).'.'.Input::file('file')->getClientOriginalExtension();
//            $uploadPath = public_path().'/uploadedFiles/'; //.Str::random(10).'.'.$extension;
//            Input::file('file')->move($uploadPath, $fileName);
            Session::push('app.uploadedFilePath.'.mt_rant(), $fileName);
        } else {
            echo 'No files';
        }
    }
}