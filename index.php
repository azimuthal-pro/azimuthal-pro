<?php
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <title>View Page</title>

    <style>
        .addTask {
            padding: 15px;
            display: flex;
            justify-content: right;
            align-items: center;
        }

        body{
            background-color: aqua;
        }
    </style>
</head>

<body>

    <div class="addTask">
        <a href="create_task.php">
            <button type="button" class="btn btn-info">Add New Task</button>
        </a>
    </div>
    <table id="todo_tb" class="table table-condensed" style="padding:25px;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Completed(Yes/No)</th>
                <th>Created Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Fecthing Data from todo table
            $fetch_data = "SELECT * FROM  task_tb";

            $stmnt = $conn->query($fetch_data);

            $fetched_data = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            if ($fetched_data) {
                foreach ($fetched_data as $key => $value) {
            ?>


                    <tr>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo $value['completed']; ?></td>
                        <td><?php echo $value['created_time']; ?></td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="update_task_form.php?id=<?php echo $value['id']; ?>">Update Task</a></li>
                                    <li><a class="dropdown-item" href="delete_task.php?id=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete Task</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            }

            ?>
        </tbody>

    </table>


</body>

</html>