
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $courserTitle = htmlspecialchars($_POST['title']);
//     $courseCate = htmlspecialchars($_POST['category']);
//     $coursePaid = htmlspecialchars($_POST['paid']);
//     echo $courserTitle, $courseCate,$coursePaid ;

   

<?php
// session_start();
require '../../database/database.php';
require '../../models/trainer.model.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category=$_POST['title'];
        echo($category);
        $image=$_FILES['image'];
        var_dump ($image);
    

   if(!empty($_POST['cateName'])){
      $worngfile="";
     if(isset($_FILES['image'])){
        var_dump($_FILES['image']);
            $img_name=$_FILES['image']['name'];
            $img_size=$_FILES['image']['size'];
            $tmp_name=$_FILES['image']['tmp_name'];
            $error=$_FILES['image']['error'];
    
            if($error===0){
                if($img_size>500000){
                     $em="Sorry your file som large";
                    echo "<script>alert('Sorry, your file is too large.');</script>";
                    require "views/category/displayCategory.view.php";
                 }else{
                     $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                     $img_ex_lc=strtolower($img_ex);
                     $allowed_exs=array("jpg","jpeg","png");
                     if(in_array($img_ex_lc,$allowed_exs)){
    
                        $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                         $img_upload_path = '../../assets/images/category/'.$new_img_name;
                         move_uploaded_file($tmp_name, $img_upload_path);
    
                         $isCreate=createCategory($_POST['cateName'],$new_img_name);

                        }else{
                        
                            echo "<script>alert('Sorry, your file is wrong extention');</script>";
                            header('Location: /trainerdashboard');
                     }
                 }
             }
         }
    
     }
    
    }else{
        header('location: /trainerdashboard');
        
    }
 if(empty($_POST['cateName'])):?>
    <script>alert("You forgot fill some information")</script> 
    <?php
    endif;
    ?>
    
    <?php
    $categorys=getCategorys();
    header('location: /displayCategory');
    
require "views/trainers/createCourse.view.php";