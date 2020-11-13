<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PaperModel extends Model
{
    protected $table = 'teach_paper';

    protected  $primaryKey = 'paper_id';

    public $timestamps = false;
}
