<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM crudsample1 WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("failed task");
        }

        $_SESSION['message'] = 'Task remove successfully';
        $_SESSION['msg_type'] = 'danger';
        
        header("location: index.php");
    }
?>