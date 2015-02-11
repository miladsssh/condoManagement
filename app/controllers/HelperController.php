<?php
use Cygnus\Commands\Upload\UploadSaveCommand;
use Cygnus\Core\CygnusResponse;

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/8/15
 * Time: 5:46 PM
 */



class HelperController extends BaseController{

    use CygnusResponse;

    public function uploadFile()
    {
        if ( Input::hasFile('file') ) {
            $oldName = Input::file('file')->getClientOriginalName();
            $newFileName = Str::random(10).'.'.Input::file('file')->getClientOriginalExtension();
            $uploadPath = public_path().'/uploadedFiles/';
            Input::file('file')->move($uploadPath, $newFileName);
            Session::push('app.uploadedFile', array($newFileName,$oldName));
        } else {
            echo 'No files';
        }
    }

    public function uploadFileFinalize($ticketId)
    {
        if(Session::get('app.uploadedFile')) {
            foreach(Session::get('app.uploadedFile') as $files):
                $input = array_add(Input::get(), 'filePath', $files[0]);
                $input = array_add($input, 'fileNewName', $files[1]);
                $input = array_add($input, 'fileRefId', $ticketId);
                $this->execute(UploadSaveCommand::class, $input);
            endforeach;
        }
        return;
    }
}