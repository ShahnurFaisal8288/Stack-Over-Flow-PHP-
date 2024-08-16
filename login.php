<?php
session_start();
include 'doc_start.php';
include 'nav.php';
include 'core/User.php';
include 'core/Validation.php';
$newUser = new User();
$newValidation = new Validation();
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 ">
                <h2>Login</h2>
            
                
            <?php
            if (isset($_POST['Submit'])) {
                $result = $newValidation->checkValidation($_POST);
                if (empty($result)) {
                    $login = $newUser->login($_POST['email'],$_POST['password']);
                    if (count($login)==1) {
                        $_SESSION['user_id'] = $login[0]['id'];
                        $_SESSION['user_name'] = $login[0]['user_name'];
                        header('location: dashboard.php');
                    }
                }else{
                    foreach ($result as $key => $value) {
                        echo '<li>'.$value.'</li>';
                    }
                }
            }
            ?>
            <form action="" method="POST">
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
