<?php 

namespace App\Controllers;

use App\Supports\database;



class StudentController extends database {

/**
 * Add a new student
 */
    public function dataSent($name, $email, $cell, $age, $location, $photo)
    {
       $this-> create("INSERT INTO students (name, email, cell, age, location, photo)
        VALUES ('$name','$email','$cell','$age','$location','$photo')");
    }

/**
 * Students Output info publis into  page
 */
public function get_data(){
    return parent::all('students');
 }
/**
 * Find Singel Data
 */
public function Singeldata( $id)
{
      return parent::find('students',$id);
}

/**
 * delete from database
 */
public function delete_id($delete_id){
  return parent::delete('students', $delete_id);
}
/**
 * edit students data
 */
public function Editeddata($edit_id)
{
    return $this->find('students',$edit_id);
}

/**
 * Updated data
 */

public function dataSender($name, $email, $cell, $age, $photo)
{
  $this->update('students',$name, $email, $cell, $age, $photo);
}






}








































?>