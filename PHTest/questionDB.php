<?php
include 'qdb.php';

$sql_select = "SELECT Question.Content As Question,
Question.Description As Category,
 Answer.Answer As Answer,
  View.WidgetType As AnswerInputType,
   View.ResponseType As ExpectedData
From CompanyQuestionSet, Company, Question, Answer, View, Activity
Where Company.Name = 'Test Company'
and CompanyQuestionSet.CompanyID = Company.CompanyID
and CompanyQuestionSet.ActivityID = Activity.ActivityID
and CompanyQuestionSet.QuestionID = Question.QuestionID
and CompanyQuestionSet.AnswerID = Answer.AnswerID
and Question.ViewID = View.ViewID";
$stmt = $conn->prepare($sql_select);
$stmt->execute();
$returnedList = $stmt->fetchAll();
echo $returnedList;
 ?>
