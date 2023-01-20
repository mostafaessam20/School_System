<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model 
{
    use HasTranslations;

    public $translatable = ['Name_Class'];
    protected $fillable=['Name_Class','Grade_id'];


    protected $table = 'Classrooms';
    public $timestamps = true;


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف
    public function Grades()
    {


        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }



    
}