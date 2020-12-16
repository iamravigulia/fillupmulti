<?php
namespace Edgewizz\Fillupmulti\Models;

use Illuminate\Database\Eloquent\Model;

class FillupmultiQues extends Model{
    public function answers(){
        return $this->hasOne('Edgewizz\Fillup\Models\FillupAns', 'question_id');
    }
    protected $table = 'fmt_fillupmulti_ques';
}