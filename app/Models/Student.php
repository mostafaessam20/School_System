<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    //علاقة لجلب  الصور 
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //علاقة لجلب اسم الجنسية

    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationality', 'nationalitie_id');
    }

    //علاقة لجلب اسم الاب

    public function My_Parent()   
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }


}