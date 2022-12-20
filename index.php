
<?php
    session_start();
    require './src/bdconect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('./src/alerta.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>COMIDA
                            <a href="./src/create.php" class="btn btn-primary float-end">Add NEW</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Origin</th>
                                    <th>Tipo</th>
                                    <th>Calorias</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM comidas";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $comidas)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $comidas['id']; ?></td>
                                                <td><?= $comidas['nombre']; ?></td>
                                                <td><?= $comidas['origen']; ?></td>
                                                <td><?= $comidas['calorias']; ?></td>
                                                <td><?= $comidas['img']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $comidas['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="student-edit.php?id=<?= $comidas['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_meal" value="<?=$comidas['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>