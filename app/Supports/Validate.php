<?php 


namespace App\Supports;
/**
 * For all validate function start here
 */
class Validate{

        public static function msgShow($msg, $type='danger')
        {
            return  "<p class=\"alert alert-{$type}\">{$msg}<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
        }
/**
 * msg shower
 * 
 */
public static function msgshower($msg)
{
    echo $msg ?? '' ;
}

/**
 * Email validate function create
 */
        public static function email($email)
        {
           if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
           }else{
               return false;

           }
        }
 /**
     * upload file
     */
    public static function upload_file($file, $path='/'){

        $file_name= time() . '-' . rand() . '-' . $file['name'];
        $file_tmp= $file['tmp_name'];
        $file_size= $file['size'];
        move_uploaded_file($file_tmp, $path . $file_name);
        return $file_name;



    }


}





















?>