<?php
include 'dbconn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $title = $_POST['title'];
        $description = $_POST['desc'];
        $completed = $_POST['completed'];
        $time = date('Y-m-d H:i:s', strtotime($_POST['time']));


        $sql = "INSERT INTO task_tb (title,description,completed,created_time) VALUES(:title,:desc,:completed,:time)";
        $stmnt = $conn->prepare($sql);

        $stmnt->bindParam(":title", $title);
        $stmnt->bindParam(":desc", $description);
        $stmnt->bindParam(":completed", $completed);
        $stmnt->bindParam(":time", $time);

        $status = $stmnt->execute();
        if($status){
            header("Location:index.php");
        }
    } catch (PDOException $e) {
        echo "Data Submission Failed" . $e->getMessage();
    }
}
