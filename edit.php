<?php
    include("db.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $query = "SELECT * FROM crudsample1 WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            
            $title = $row["title"];
            $description = $row["description"];
        }
    }

    if(isset($_POST["update"])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST["description"];

        $query = "UPDATE crudsample1 SET title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION["message"] = "Task Update successfully";
        $_SESSION["msg_type"] = "info";

        header("Location: index.php");
    }
?>

<?php include("head.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET["id"]?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"><?php echo $description; ?></textarea>
                    </div>

                    <button class="btn btn-success" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>