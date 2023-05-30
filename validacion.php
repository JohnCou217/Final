<?php
    
    include 'conexion.php';


    $username=$_POST['user'];
    $password=$_POST['pw'];

    $consult = "SELECT * FROM login WHERE usuario = '$username' and contraseña = '$password'";
    $login = $conn->query($consult);

    $result = mysqli_num_rows($login);

    if ($result ){
        header("location:index.php");
        session_start();
        $_SESSION['usuario']=$username;
    }
    else {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Error!</strong>
                        Usuario y/o contraseña incorrectos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    include("login.php");
    }

    mysqli_free_result($login);
    mysqli_close($conn);
?>