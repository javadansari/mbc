<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rev extends Model
{
    //
    protected $fillable = [
        'projectID', 'rev', 'allPipe', 'allStress', 'designPipe', 'stressPipe', 'supportPipe' , 'releasePipe',
        'fabricatePipe', 'noStatusPipe'
    ];

}
