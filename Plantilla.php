<?php
require "Alumnos.php";
$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>ID<th>Nombre</th><th>Institucion</th><th>Tipo de Servicio</th><th>Horas</th><th>Fecha</th><th>Area</th><th>Direccion</th><th>Numero Celulular</th><h>Correo</th><th>Numero Emergencia</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr> <td>".$r->id."</td><td>".$r->nombre."</td><td>".$r->institucion."</td><td>".$r->tipo_de_servicio."</td><td>".$r->horas."</td><td>".$r->fecha."</td><td>".$r->area."</td><td>".$r->direccion."</td><td>".$r->numero_celulular."</td><td>".$r->correo."</td><td>".$r->numero_emergencia."</td></tr>";
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Alumnos_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;