<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    protected $table = 'teach_exam';

    protected  $primaryKey = 'exam_id';

    public $timestamps = false;

}
