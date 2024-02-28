<?php
require "database/database.php";
require "models/trainer.model.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $worngfile = "";
        if (isset($_FILES['img'])) {
            $img_name = $_FILES['img']['name'];
            $img_size = $_FILES['img']['size'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];

            if ($error === 0) {
                if ($img_size > 500000) { 
                    $em = "Sorry your file som large";
                    echo "<script>alert('Sorry, your file is too large.');</script>";
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex_lc, $allowed_exs)) {

                        $new_img_name = uniqid("", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'assets/images/instructor/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        $isCreate = createTrainer($username, $email, $password, $new_img_name);
                        if ($isCreate) {
                            $teachers = getTeacher();
                            require "views/trainers/adminTrainer.view.php";
                        }
                    } else {

                        echo "<script>alert('Sorry, your file is wrong extention');</script>";
                    }
                }
            }
        }
    }
} else {
    require "views/trainers/adminTrainer.view.php";
}
if (empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password'])) : ?>
    <script>
        alert("You forgot fill some information")
    </script>
<?php endif ?>

<?php
$teachers = getTeacher();
require "views/trainers/adminTrainer.view.php";