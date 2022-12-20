<?php
session_start();
require 'dbconect.php';

if(isset($_POST['delete_comida']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_comida']);

    $query = "DELETE FROM comidas WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['alerta'] = "Meal Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['alerta'] = "Meal Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_comida']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $origen = mysqli_real_escape_string($con, $_POST['origen']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $calorias = mysqli_real_escape_varchar($con, $_POST['calorias']);
    $img = mysqli_real_escape_longblob($con, $_POST['img']);

    $query = "UPDATE comidas SET name='$nombre', origen='$origen', tipo='$tipo', calorias='$calorias' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['alerta'] = "MEAL Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['alerta'] = "Meal Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $origen = mysqli_real_escape_string($con, $_POST['origen']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $calorias = mysqli_real_escape_varchar($con, $_POST['calorias']);
    $img = mysqli_real_escape_longblob($con, $_POST['img']);
    $query = "INSERT INTO comidas (name, origen, tipo, calorias ) VALUES ('$nombre', '$origen', '$tipo', '$calorias', $id' )";
 

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}





