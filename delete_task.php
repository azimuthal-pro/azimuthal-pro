<?php
include 'dbconn.php';

try {
    if (isset($_GET['id'])) {
        $del_id = $_GET['id'];

        $sql = "DELETE FROM task_tb WHERE id = :delete_id";

        $stmnt = $conn->prepare($sql);

        $stmnt->bindParam(':delete_id', $del_id);

        $status = $stmnt->execute();

        if($status){
            header("Location:index.php");
        }
    }
} catch (PDOException $e) {
    echo "Data deletion unsuccessful" . $e->getMessage();
}
