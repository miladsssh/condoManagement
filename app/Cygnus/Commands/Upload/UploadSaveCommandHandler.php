<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/10/15
 * Time: 7:52 PM
 */

namespace Cygnus\Commands\Upload;

use Cygnus\Repo\Upload\Upload;
use Cygnus\Repo\Upload\UploadRepo;
use Laracasts\Commander\CommandHandler;

class UploadSaveCommandHandler implements CommandHandler {

    protected $repository;


    public function __construct(UploadRepo $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $upload = Upload::register( $command->filePath,
                                    $command->fileNewName,
                                    $command->fileRefId);

        $this->repository->save($upload);
        return $upload;
    }
}