
<?php
include 'dbconn.php';
var_dump($_POST);
try {
    // Check if all required fields are present in $_POST
    if (!isset($_POST['id']) || !isset($_POST['titleupdate']) || !isset($_POST['descupdate']) || !isset($_POST['completedupdate']) || !isset($_POST['timeupdate'])) {
        throw new Exception("All form fields are required.");
    }

    // Get the form data
    $id = $_POST['id'];
    $titleupdate = $_POST['titleupdate'];
    $descupdate = $_POST['descupdate'];
    $completedupdate = $_POST['completedupdate'];
    $timeupdate = $_POST['timeupdate']; // Time in HH:MM format

    $datetime = date('Y-m-d') . ' ' . $timeupdate . ':00';


    $sql = "UPDATE task_tb SET title = :titleupdate, description = :descupdate, completed = :completedupdate, created_time = :timeupdate WHERE id = :id";
    $stmnt = $conn->prepare($sql);

    // Bind parameters
    $stmnt->bindParam(':titleupdate', $titleupdate);
    $stmnt->bindParam(':descupdate', $descupdate);
    $stmnt->bindParam(':completedupdate', $completedupdate);
    $stmnt->bindParam(':timeupdate', $datetime);
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    $status = $stmnt->execute();

    if ($status) {
        header("Location: index.php");
        exit(); 
    } else {
        throw new Exception("Failed to update the task.");
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>