
<?php
    include 'encabezado.php';
    include 'conexion.php';
?>

<?php
    if (isset($_GET['del'])) {
        $idb=$_GET['del'];
        $borrar="DELETE FROM documentos where IdDocs='$idb'";
        $eliminar=$conn->query($borrar);
       #header('location:Documentos.php');
    }
    if (isset($_POST['ingreso'])) {
        # code...
        
        $nombreDoc=$_REQUEST['nombredoc'];
        $Id_Alumno_fk=$_REQUEST['Id_Alumno_fk'];
        //$Id_alumno_fk no tiene nada asignado
        $nombre_pdf=$_FILES['pdf']['name'];
        $archivo=$_FILES['pdf']['tmp_name'];
        $ruta="fpdf";

        $ruta=$ruta."/".$nombre_pdf;

        move_uploaded_file($archivo, $ruta);
        $insertar="INSERT INTO documentos(nombreDoc,Id_Alumno_fk,ruta) VALUES ('$nombreDoc','$Id_Alumno_fk','$ruta')";
        //print($insertar);
        $resultadp=$conn->query($insertar);
        if (!$resultadp) {
            
            echo 'error al Registrarse '.$conn->error;
        }else{
        
        }
    }

    if (isset($_POST['cambio'])) {
        # code...
         
        $idca=$_REQUEST['idca'];
        $Id_Alumno_fk=$_REQUEST['Id_Alumno_fk'];
        $nombredoc=$_REQUEST['nombreDoc'];                        
        $nombre_pdf=$_FILES['ruta']['name'];
        $archivo=$_FILES['ruta']['tmp_name'];
        $ruta="fpdf";

        $ruta=$ruta."/".$nombre_pdf;
        move_uploaded_file($archivo, $ruta);
        $Cambiar="UPDATE documentos SET nombreDoc='$nombredoc',Id_Alumno_fk='$Id_Alumno_fk',ruta='$ruta'WHERE IdDocs='$idca'";
        //print($Cambiar);
        $resultado2=$conn->query($Cambiar);
        
        if (!$resultado2) {
            
            echo 'error al Registrarse '.$conn->error;
        }else{
        }
    }

    
?>

<section class='container mb-5 mt-5'>
    <h2 class='mt-5'>Documentos Registrados</h2>
    <?php
        $coman='SELECT * FROM documentos';
        $datos=$conn->query($coman);
    ?>

    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row w3-right">
            <div class="col-8">
            <input class="w3-input" type="text" name="matrib" id="matrib" placeholder="Buscar" required> 
            </div>
            <div class="col">
            <input class="w3-button w3-round w3-blue" type="submit" value="Buscar" name="enviarBus">
            </div>
        </div>
        
       
        
        </form>
    </div>
        <section class='mb-5 mt-5'>
            <?php
                if (isset($_POST['enviarBus'])) {
                    $busqueda =$_POST['matrib'];
                    //$bus="SELECT * FROM misdocumentos WHERE nombreDoc='$busqueda' or nombre='$busqueda' ORDER BY nombreDoc ASC";
                    $bus="select d.IdDocs, d.nombreDoc, a.Nombre, d.ruta, d.Id_Alumno_fk from documentos as d join alumnos as a ON id_alumno_fk = idalumnos WHERE nombreDoc='$busqueda' or nombre='$busqueda' ORDER BY d.nombreDoc ASC";
                    $resultb=$conn->query($bus);
                    if ($resultb->num_rows >0) {
                        echo '
                    <h2>Registros encontrados</h2>
                    <table class="table">
                    <thead>
                    <th>Nombre del Alumno</th>
                    <th>Documentos de: '.$busqueda.'</th>
                         
                            <th>Enlace</th>
                    </thead>
                    <tbody>
                    ';
                    while ($filarb=$resultb->fetch_array()) {
                        # code...
                        echo '
                        <tr>
                        <td>'.$filarb["Nombre"].'</td>
                        <td>'.$filarb["nombreDoc"].'</td>
                        <td><a class="w3-text-blue" href="'.''.$filarb ['ruta'].'"target ="_blank"> '.$filarb["nombreDoc"].'</td>                      
                        </tr>
                        ';
                        
                    }

                    echo '
                        </tbody>
                    </table>
                    ';

                    }else{
                        echo '<br>
                        <div class="alert alert-danger" role="alert">
                        <strong>ERROR DE BUSQUEDA!</strong> No se encontro ningun Alumno con ese Nombre '.$busqueda.'.
                        </div>
                        ';
                    }
                }
            ?>
           
                    
                
        </section>
    
    <table class='table mb-5 mt-5'>
        
        <thead>
            <th colspan="3">Todos los Prestadores de Servicio</th>
               <td colspan="6" class='d-flex justify-content-start'> <button class='w3-green w3-button w3-round' title="Agregar Alumno" onclick='document.getElementById("modalAlta").style.display="block"'><i class="fas fa-plus"></i></button></td>
               
        </thead>
            
        <tbody>
            <?php
                //$sql="SELECT * FROM misdocumentos ORDER BY nombreDoc ASC";
                $sql="select d.IdDocs, d.nombreDoc, a.Nombre, d.ruta, d.Id_Alumno_fk from documentos as d join alumnos as a ON id_alumno_fk = idalumnos ORDER BY d.nombreDoc ASC";
                $re=$conn->query($sql);
                if ($re->num_rows >0){
                    ?>
                    <tr>
                        <td style="visibility: hidden;"></td>
                        <th>Nombre Alumno</th>
                        <th>Documento</th>                    
                        <th colspan="2">Acciones</th>
                    </tr>
                    
                    <?php
                    while ($filal=$re->fetch_array()) {
                        echo '
                        <tr>
                        <td style="visibility:collapse;">'.$filal["IdDocs"].'</td>
                        <td>'.$filal["Nombre"].'</td>
                        <td>'.$filal["nombreDoc"].'</td>
                        
                       
                        <td><button type="button" id="editbtn" class="editbtn w3-blue w3-button w3-round" data-bs-toggle="modal" data-bs-target="#ModalEditar"><i class="far fa-edit"></i></button></td>';
                        echo "<td><button onclick='preguntar(".$filal['IdDocs'].")' class='w3-button w3-round w3-red' title='Borrar Elemento'><i class='far fa-trash-alt'></i></button></td>
                        </tr>
                        ";
                    }
                    
                } else {
                    echo "<td ROWSPAN='8'>No hay Documentos registrados</td>";
                }
            ?>
        </tbody>

    </table>

</section>
<div class="c modal" tabindex="-1" id='modalAlta'>
    <style>
        .c{
            background-color: rgba(0, 0, 0,0.6);
        }
    </style>
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Añadir Documento</h5>
        <button type="button" onclick="document.getElementById('modalAlta').style.display='none'" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class='mb-4'>Por favor, ingrese los datos solicitados.</h4>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <label for="">Nombre del documento: </label>
                    <select class='w3-input' name="nombredoc" class="form-control"> 
                        <option selected disabled>Selecciona un Documento</option>
                        <option value="Presentación">Carta Presentación</option>
                        <option value="Constancia de Vigencia de Derechos">Constancia de Vigencia de Derechos</option>
                        <option value="Esquema de Vacunación">Esquema de Vacunación</option>
                        <option value="Carta de Aceptación">Carta de Aceptación</option>
                        <option value="Carta de Liberación">Carta de Liberación</option>
                    </select><br> 
                    <label for="">Nombre del Alumno: </label>
                    <select class='w3-input' name="Id_Alumno_fk" class="form-control">
                        <option selected disabled>Selecciona un Alumno</option>
                        <?php 
                        $nalum = "SELECT * FROM Alumnos";
                                $datosnalum = $conn->query($nalum);
                        while ($row = $datosnalum->fetch_assoc())
                        {
                        ?>
                        <option value="<?php echo $row['IdAlumnos']; ?>"><?php echo $row['Nombre']; ?></option>
                        <?php 
                            }
                        ?>
                    </select><br>
                    <input type="file" name="pdf" size="20" class="form-control" required>
                    
            
        
      <div class="modal-footer">
        <button type="button" onclick="document.getElementById('modalAlta').style.display='none'" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit" name='ingreso' class='btn btn-primary' value="Guardar"> 
        
      </div>
      </form>
    </div>
  </div>
</div>
</div> 

<!--Comando para confirmar el borrado de un registro y posteriormente borrarlo-->
<script>
    function preguntar(IdDocs){
        if(confirm('¿Estas seguro que quieres Eliminar este documento?.')){
            window.location.href='Documentos.php?del='+IdDocs;
        }
    }
</script>




<!-- Modal para editar-->
<div class="modal fade" id="ModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar documentos del Alumno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name='idca' id='update_id'>
                    
                    <label for="">Nombre del documento: </label>
                    <select class='w3-input' id='nombreDoc' name='nombreDoc' type="text" placeholder="TipoServ" required>
                        <option selected disabled>Selecciona un Documento</option> 
                        <option value="Presentación">Carta Presentación</option>
                        <option value="Constancia de Vigencia de Derechos">Constancia de Vigencia de Derechos</option>
                        <option value="Esquema de Vacunación">Esquema de Vacunación</option>
                        <option value="Carta de Aceptación">Carta de Aceptación</option>
                        <option value="Carta de Liberación">Carta de Liberación</option>
                    </select><br>
                    <label for="">Nombre del Alumno: </label>
                    <select class='w3-input' id="Id_Alumno_fk" name="Id_Alumno_fk" class="form-control">
                        <option selected disabled>Selecciona un Alumno</option>
                        <?php 
                        $nalum = "SELECT * FROM Alumnos";
                                $datosnalum = $conn->query($nalum);
                        while ($row = $datosnalum->fetch_assoc())
                        {
                        ?>
                        <option value="<?php echo $row['IdAlumnos']; ?>"><?php echo $row['Nombre']; ?></option>
                        <?php 
                            }
                        ?>
                    </select><br>

                    <input type="file" name="ruta" id="ruta" size="20" class="form-control" required>

                    <!--</select>
                    <label for="">Matricula</label>
                    <input type="text" name='matricula' id='matricula' class="w3-input" placeholder="Matricula"> -->
                    
      <div class="modal-footer">
        <button type="button" class="w3-button w3-round w3-border" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit" name='cambio' class='w3-button w3-blue w3-round w3-border' value="Guardar Cambios">
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!--script para el modal editar-->
<script>
    $('.editbtn').on('click',function(){
        $tr=$(this).closest('tr');
        var datos=$tr.children("td").map(function(){
            return $(this).text();
        });

        $('#update_id').val(datos[0]);
        $('#Id_Alumno_fk').val(datos[1]);
        $('#nombreDoc').val(datos[2]);        
        $('#ruta').val(datos[3]);
        
    })
</script>
                    

<?php
    include 'pie.php';
?>