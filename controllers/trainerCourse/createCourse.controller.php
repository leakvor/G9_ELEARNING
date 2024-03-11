<!-- <h1>leak</h1> -->
<?php
require('../../database/database.php');
require('../../models/course.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(!empty($_POST['title']) && !empty($_POST['teacher']) && !empty($_POST['category'])){
  $worngfile="";
 if(isset($_FILES['img']) && $_POST['category']!="#"){
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];

        if($error===0){
            if($img_size>500000){
                 $em="Sorry your file som large";
                echo "<script>alert('Sorry, your file is too large.');</script>";
                
             }else{
                 $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                 $img_ex_lc=strtolower($img_ex);
                 $allowed_exs=array("jpg","jpeg","png");
                 if(in_array($img_ex_lc,$allowed_exs)){

                    $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                     $img_upload_path = '../../assets/images/course/'.$new_img_name;
                     move_uploaded_file($tmp_name, $img_upload_path);
                    echo $_POST['teacher'];
                     $isCreate=createCourse($_POST['title'], $new_img_name, $_POST['teacher'], $_POST['category'],$_POST['paid']);
                    if($isCreate){
                        $courses = getCourse();
                    }
                    }else{
                    
                        echo "<script>alert('Sorry, your file is wrong extention');</script>";
                 }
             }
         }
     }

 }

}else{
    // header('location: /adminCourse');
    
}
if(empty($_POST['title']) || empty($_POST['teacher'])|| empty($_POST['category'])):?>
<script>alert("You forgot fill some information")</script>
<?php endif ?>

<?php
// $courses=getCourse();
header('Location: /trainerdashboard');
// require "views/courses/adminCourse.view.php";

