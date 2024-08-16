<?php
session_start();
include 'doc_start.php';
include 'nav.php';
include 'core/User.php';
include 'core/Validation.php';
include 'core/Question.php';
$newQuestion = new Question();
$newUser = new User();
$newValidation = new Validation();
$singleQuestion = $newQuestion->singleQuestion($_GET['id']);

$answerList = $newQuestion->answerList($_GET['id']);
// print_r($singleQuestion);
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <h2>Question Details</h2>
            <h5>title:<?= $singleQuestion[0]['title'] ?></h5>
            <?php
            if($singleQuestion[0]['user_id']==$_SESSION['user_id']){
                $qid = $singleQuestion[0]['id'];
                echo "<a class='btn btn-success' href='questionEdit.php?qid=$qid'>Edit </a>".'<br><br>';
                echo "<a class='btn btn-success' href='questionDelete.php?qid=$qid'>Delete</a>";
            }
            ?>
            <h5>description:<?= $singleQuestion[0]['details'] ?></h5>

        </div>
        <div class="col-12 mt-3">
            <h2>Answer Form</h2>
            <?php
            if (isset($_POST['Submit'])) {
                $answer = $newQuestion->questionAnswer($_POST['details'],$_GET['id'],$_SESSION['user_id']);
                if ($answer) {
                    echo "success";
                }
            }
            ?>
            <form action="" method="POST">
                <textarea class="form-control mb-2" name="details" placeholder="details"></textarea>
                <input class="btn btn-outline-success" type="submit" name="Submit">
            </form>
        </div>
        <?php foreach($answerList as $value):?>
        <div class="col-12 mt-3">
            <h4><?=$value['user_name']?></h4>
            <h4><?=$value['details']?></h4>
            <hr>
        </div>
        <?php endforeach;?>
    </div>
</div>
<br>
<br>
<?php
include 'footer.php';
include 'doc_end.php';
?>