<?php
    include 'encabezado.php';
    
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <section class='container p-4 mb-5 mt-5'>
        <div class='row align-items-center gx-5'>

            <div class='col'>
                <table class='table'>
                    <thead>
                        <th>Número de Prestadores de Servicio Registrados</th>
                    </thead>
                    <tbody>

                <?php
                    $al1='SELECT * FROM Alumnos';
                    $conla=$conn->query($al1);
                        # code...
                        echo '<th>'.$conla->num_rows.' Registrados Actualmente</th>';
                    
                ?>
                    

                    </tbody> 
                </table>
                <a href="imprimir.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado completa de todos los registros</button></a>
                <br>
                <a href="imprimir_residencias.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado de Residentes</button></a>
                <br>
                <a href="imprimir_servicioSocial.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado de Servico Social</button></a>
                <br>
                <a href="imprimir_estadias.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado de Estadias</button></a>
                <br>
                <a href="imprimir_estancias.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado de Estancias</button></a>
                <br>
                <a href="imprimir_practicasProfesionales.php"><button class='w3-button  w3-round w3-border w3-hover-green'><i class="fas fa-file-pdf"></i> Imprimir listado de Practicas Profesionales</button></a>
                <br>
                
              
            </div>
            
 
            <div class='col justify-content-center' align='center' >
                <canvas id='myChart' ></canvas><br>
                
            </div>

        </div>
    </section>

    
            
           
    

    <script>
        
