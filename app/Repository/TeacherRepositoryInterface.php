<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // Get all Teachers
    public function getAllTeachers();


     // Get specialization
     public function Getspecialization();

     // Get Gender
     public function GetGender();
 
     // StoreTeachers
     public function StoreTeachers($request);


     // Edit teachers 
     public function editTeachers($id);


     // Update Teachers
     public function UpdateTeachers($request);


     // Delete Teachers
    public function DeleteTeachers($id);

}


