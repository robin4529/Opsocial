<?php 

namespace App\Supports;

use mysqli;




abstract class database {

                private $host = Host;
                private $User = User ;
                private $pass = Pass;
                private $db = Db ;
                private $connection ;
        // Server Connection //
               private function connection()
                {
                  return $this->connection= new mysqli($this->host, $this->User, $this-> pass, $this->db);
                }

/**
 * Get all Data
 */
protected function all($table, $order='DESC'){
    return $this->connection()->query("SELECT * FROM {$table} ORDER BY id {$order}");
 }
/**
 *Create All data
 */
protected function create($sql){
    $this->connection()->query($sql);
}
/**
 * Get all find data or serach find data
 */
protected function find( $table ,$id)
{
  $student =$this->connection()->query("SELECT * FROM {$table} WHERE id='{$id}'");

         return $student->fetch_object();

}

/**
 * Updated All data
 */
protected function update($table, $id)
{
 return $this->connection()->query("UPDATE students SET name='{$name}',
   email='{$email}', cell='{$cell}', age='{$age}', photo='{$photo}'WHERE id='{$id}'");
}
/**
 * Deleted data from database
 */

protected function delete($table, $id){
  return $this->connection()->query("DELETE FROM {$table} WHERE id={$id}");
}















}





















?>