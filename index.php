<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">CRUD</span>
        </div>
    </nav>

    <div class="container m-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <?php if(isset($_SESSION['message'])){?>
                            <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
                                <?=$_SESSION['message'];?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php session_unset(); }?>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="2" class="form-control"></textarea>
                        </div>
                        <input type="submit" name="saveinfo" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM crudsample1";
                            $result_qry = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_qry)){
                        ?>
                            <tr>
                                <td><?php echo $row['title']?></td>
                                <td><?php echo $row['description']?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa-solid fa-pen-clip"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>