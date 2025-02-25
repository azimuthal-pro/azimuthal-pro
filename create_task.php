<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>

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
        <form action="createProcess.php" method="POST">
            <h2>Create a New Task</h2>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter name of Task" required><br><br>

            <label for="desc">Description</label>
            <textarea name="desc" id="desc" row="2" cols="34">Describe Your task</textarea><br><br>

            <label>Task Completed?</label>
            <div class="completed">
                <label for="yes"><input type="radio" id="yes" name="completed" value="yes" required>Yes</label>
                <label for="no"><input type="radio" id="female" name="completed" value="no">No</label>
            </div><br><br>

            <label for="time">Created Time</label>
            <input type="time" id="time" name="time" required><br><br>

            <input type="submit" value="Submit">
    </div>
    </form>


</body>

</html>