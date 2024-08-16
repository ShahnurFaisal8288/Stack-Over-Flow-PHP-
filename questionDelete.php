<?php
session_start();
include 'core/User.php';
include 'core/Question.php';
$newUser = new User();
$newQuestion = new Question();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}
$singleQuestion = $newQuestion->singleQuestion($_GET['qid']);
if (isset($_GET['qid'])) {
    if ($singleQuestion[0]['user_id'] == $_SESSION['user_id']) {
        $newQuestion->deleteQuestion($_GET['qid']);
        header('location: dashboard.php');
        die();
    }
}


?>