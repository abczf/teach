<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LectModel extends Model
{
     protected $table = 'teach_lect';

    protected  $primaryKey = 'lect_id';

    public $timestamps = false;
}
