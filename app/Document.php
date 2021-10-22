<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
      'name', 'folder', 'keywords_in', 'keywords_out', 
    ];
}

