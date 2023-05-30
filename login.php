<?php
    include 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>CDNN</title>

	<link rel="shortcut icon" href="logoNog.png">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fa773493cf.js" crossorigin="anonymous"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
	  <div class="container">
	    <a class="navbar-brand" href="index.php">
	      <img src="logoNog.png" alt="logo H. Ayuntamiento Municipal de Nogales,Veracurz" width="120" height="100">
	    </a>
	  </div>
  </div>
</nav>

<section>
        <div class="container w3-display-container margin p-3">
            <div class="row">
                <div class="col-3">
                    
                    <section>
                        <div class="container margin p-3">

                        </div>
                    </section>
                </div>

                <div class="col-6">

                    <section>
                        <div class="container margin p-3">
                            <div class="card">
                                <center> <h2 class="card-header w3-text-green"><b>Iniciar Sesión</b></h2> </center>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4"> 
                                            
                                        </div>
                                        <div class="col-4">
                                            <form action="validacion.php" method="POST">
                                                <input placeholder="Usuario: " type="text" name="user"> <br><br>
                                                <input placeholder="Contraseña: " type="password" name="pw"><br><br>
                                                <center>
                                                    <button class="w3-btn w3-hover-green w3-border w3-border-teal w3-text-teal w3-round-large" type="submit">
                                                        <span class="fa-solid fa-right-to-bracket"></span> Iniciar Sesión </button>
                                                </center>
                                            </form> 
                                            
                                        </div>
                                        <div class="col-4"> 
                                            
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-3">

                    <section>
                        <div class="container margin p-3">

                        </div>
                    </section>
                </div>

            </div>
        </div>
    </section>
</body>