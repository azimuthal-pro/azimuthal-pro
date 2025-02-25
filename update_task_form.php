<?php
include 'dbconn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = "SELECT * FROM task_tb WHERE id = :id";
    $stmnt = $conn->prepare($data);
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmnt->execute();

    $fetch = $stmnt->fetch(PDO::FETCH_ASSOC);

    if ($fetch) {
        // Data found, do something with it
        //print_r($fetch);

        $title = $fetch['title'];
        $desc = $fetch['description'];
        $completed = $fetch['completed'];
        $time = $fetch['created_time'];
    } else {
        echo "No task found with the given ID.";
    }
} else {
    echo "Error: 'id' parameter is missing in the URL.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Update</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, rgb(57, 43, 63), rgb(63, 141, 120));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="radio"],
        .form-container select {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container .completed {
            display: flex;
            justify-content:
        }

        .form-container label {
            margin: 5px;
            font-size: 16px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="update_task_process.php" method="POST" >
            <h2>Update Task</h2>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="title">Title</label>
            <input type="text" id="titleupdate" name="titleupdate" placeholder="Enter name of Task" required value="<?php echo htmlspecialchars($title); ?>"   ><br><br>

            <label for="desc">Description</label>
            <textarea name="descupdate" id="descupdate" rows="2" cols="34" ><?php echo htmlspecialchars($desc); ?></textarea><br><br>

            <label>Task Completed?</label>
            <div class="completed">
                <label for="yes"><input type="radio" id="yes" name="completedupdate" value="yes" <?php echo ($completed == 'yes') ? 'checked' : ''; ?> required>Yes</label>
                <label for="no"><input type="radio" id="female" name="completedupdate" value="no" <?php echo ($completed == 'no') ? 'checked' : ''; ?>>No</label>
            </div><br><br>

            <label for="time">Created Time</label>
            <input type="time" id="time" name="timeupdate" required  value="<?php echo htmlspecialchars($time); ?>"><br><br>

            <input type="submit" value="Submit">
    </form>

    </div>


</body>

</html>