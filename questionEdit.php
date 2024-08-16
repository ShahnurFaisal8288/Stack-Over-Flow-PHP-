<?php
session_start();
include 'doc_start.php';
include 'nav.php';
include 'core/User.php';
include 'core/Validation.php';
include 'core/Question.php';
$newUser = new User();
$newQuestion = new Question();
$newValidation = new Validation();
if (!isset($_SESSION['user_id'])) {
  header('location: login.php');
}
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <h2>Edit Question</h2>
      <?php

      if (isset($_GET['qid'])) {
        
        $singleQuestion = $newQuestion->singleQuestion($_GET['qid']);
        // print_r($singleQuestion);
        // if($singleQuestion[0]['user_id'] != $_SESSION['user_id']){
        //   echo "<script>alert('UnAuthorized')</script>";
        //   die;
        // }
      }
      if (isset($_POST['Submit'])) {
        $newQuestion->updateQuestion($_POST['title'], $_POST['details'], $_GET['qid'],$singleQuestion[0]['user_id']);
        
        header('Location: '.$_SERVER['PHP_SELF'].'?qid='.$_GET['qid']);
        die;
      }

      ?>

      <form action="" method="POST">
        <input class="form-control mb-2" type="text" name="title" value="<?= $singleQuestion[0]['title'] ?>" placeholder="Title">
        <textarea class="form-control mb-2" name="details" placeholder="details" id="textarea"><?= $singleQuestion[0]['details'] ?></textarea>
        <input class="btn btn-outline-success" type="submit" name="Submit">
      </form>
    </div>
  </div>
  <!-- Place the first <script> tag in your HTML's <head> -->
  <script src="https://cdn.tiny.cloud/1/bkjdb5hjqma0faz01xw7uh95186fwpt3j4rry8bdawqq1osg/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

  <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
  </script>

</div>
<br>
<br>
<?php
include 'footer.php';
include 'doc_end.php';
?>