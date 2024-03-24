<?php
require("../../database/database.php");
require("../../models/student.model.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    if(isset($_FILES['img'])){
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];
        header("Location: /");

        if($error===0){
            if($img_size>12500000){
                $em="Sorry your file som large";
                echo "<script>alert('Sorry, your file is too large.');</script>";
                
             }else{
                 $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                 $img_ex_lc=strtolower($img_ex);
                 $allowed_exs=array("jpg","jpeg","png");
                 if(in_array($img_ex_lc,$allowed_exs)){

                    $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                    $img_upload_path = '../../assets/images/instructor/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $usGetimg  = profile($email,$new_img_name);
                    if(isset($usGetimg)){
                        $_SERVER['profile'] = $new_img_name;
                        header("Location: /");
                        echo "<script>alert('your profile has changed!');</script>";
                    }
                    }else{
                        echo "<script>alert('Sorry, your file is wrong extention');</script>";
                        header("Location: /");
                 }
             }
         }
    }
}
?>