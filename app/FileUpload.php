<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $fillable = ['file'];

    protected $table = 'file_uploads';

    protected $uploads = 'fileUploads/';

    public function getFileAttribute($photo){

        return $this->uploads . $photo;

    }
}
