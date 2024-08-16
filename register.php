<?php
include 'doc_start.php';
include 'nav.php';
include 'core/Validation.php';
include 'core/User.php';
$newValidation = new Validation();
$newUser = new User();
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 ">
            <h2>Register</h2>
            <?php
            if (isset($_POST['Submit'])) {
                $result = $newValidation->checkValidation($_POST);
                if (empty($result)) {
                    $newUser->registration($_POST['user_name'],$_POST['email'],$_POST['password']);
                    header('location: login.php');
                } else {
                    foreach ($result as $key => $value) {
                        echo '<li style="color:red">' . $value . '</li>';
                    }
                }
            }
            ?>
            <form action="" method="POST">
                <input class="form-control mb-2" type="text" name="user_name" placeholder="Name">
                <input class="form-control mb-2" type="email" name="email" placeholder="Email">
                <input class="form-control mb-2" type="password" name="password" placeholder="Password">
                <input class="btn btn-outline-success" type="submit" name="Submit">
            </form>
        </div>
    </div>
</div>
<br>
<br>
<?php
include 'footer.php';
include 'doc_end.php';
?>