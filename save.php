<?php
    include('db.php');

    if(isset($_POST['saveinfo'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO crudsample1(title, description) VALUES('$title', '$description')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = "Task saved succesfully!";
        $_SESSION['msg_type'] = "success";

        header("location: index.php");
    }
?>