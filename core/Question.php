<?php
class Question{
    use Database;
//question
public function question($title,$details,$user_id){
    $sql = "INSERT INTO questions (title,details,user_id) VALUES (:title,:details,:user_id)";
    $this->dataWrite($sql,['title'=>$title,'details'=>$details,'user_id'=>$user_id]);
}
// questionList
public function questionList(){
    $sql = "SELECT * FROM questions ORDER BY id DESC";
    return $this->dataRead($sql);
}
//singleQuestion
public function singleQuestion($id){
    $sql = "SELECT * FROM questions WHERE id=:id";
    return $this->dataRead($sql,['id'=>$id]);
}
//questionAnswer
public function questionAnswer($details,$question_id,$user_id){
    $sql = "INSERT INTO answers (details,question_id,user_id) VALUES (:details,:question_id,:user_id)";
    $this->dataWrite($sql,['details'=>$details,'question_id'=>$question_id,'user_id'=>$user_id]);
}
//answerList
public function answerList($question_id){
    $sql = "SELECT answers.details,answers.user_id,users.user_name FROM questions 
    JOIN answers ON questions.id = answers.question_id 
    JOIN users ON users.id = answers.user_id 
    WHERE questions.id = :question_id";
return $this->dataRead($sql, ['question_id' => $question_id]);
}
//UpdateQuestion
public function updateQuestion($title, $details, $question_id,$user_id) {
    if ($user_id == $_SESSION['user_id']) {
        $sql = "UPDATE questions SET title=:title, details=:details WHERE id=:question_id";
        $this->dataWrite($sql, [
            'title' => $title,
            'details' => $details,
            'question_id' => $question_id,
        ]);
    }else {
        echo "<script>alert('UnAuthorized')</script>";
        die;
    }
   
}
//deleteQuestion
public function deleteQuestion($qid){
    $sql = "DELETE FROM questions WHERE id=:qid";
    $this->dataWrite($sql,[
        'qid'=>$qid
    ]); 
}
}
?>