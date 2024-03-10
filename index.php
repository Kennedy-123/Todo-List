<?php include 'database.php' ?>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['newTodo'])) {
        $nameErr = 'Enter a new Todo';
    } else {
        $newTodo = filter_input(INPUT_POST, 'newTodo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        mysqli_query($connection, "INSERT INTO todolist (List) VALUES ('$newTodo')");
    }
}

$getDataSql = 'SELECT * FROM todolist';
$resultQuery = mysqli_query($connection, $getDataSql);
$feedback = mysqli_fetch_all($resultQuery, MYSQLI_ASSOC);
$getId = mysqli_query($connection, 'SELECT (Id) FROM todolist');
$id = mysqli_fetch_all($getId, MYSQLI_ASSOC);

if (empty($feedback)) {
    $empty = 'Add Todo';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="todoList_container">
        <h2 class='heading'>TODO LIST</h2>
        <div class="addTodoList_container">
            <form action="" method="post">
                <input type="text" name='newTodo' placeholder="What would you like to do?">
                <input type="submit" name="submit" value="Add">
                <p class="errSms"><?php echo $nameErr ?? null?></p>
            </form>
        </div>

        <div class="todoList_body">
            <h1 class="subHeading">Todo List</h1>
            <div class="todoList_header">
                <table>
                    <tr class="colmnHead">
                        <th>List</th>
                        <th>Date</th>
                        <th>Remove</th>
                    </tr>
                    <?php foreach ($feedback as $list) : ?>
                        <tr class='todo'>
                            <td><?php echo $list['List'] ?></td>
                            <td><?php echo $list['Date'] ?></td>
                            <td><input type="button" value="Remove" name="remove" class='removeBtn'></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <p class="message"><?php echo $empty ?? null ?></p>
        </div>
    </div>
    <script src="app.js"></script>
    <p class='footer'>Made by <img src="logo.png" alt="" class="logo"> Ken D Coder</p>
    <p class="footer">Copyright &copy; <?php echo date('Y')?></p>
</body>

</html>