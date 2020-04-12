<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    //
    protected $fillable = [
        'project', 'type', 'size1', 'size2', 'name', 'status' , 'comment', 'link',
    ];

}
