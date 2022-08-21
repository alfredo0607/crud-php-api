<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
require('conexion.php');

$respuesta['codigo']='-1';
$respuesta['mensaje']='No hay registros';
// si le enviamos parametros
$sql="select * from cliente order by id";
if(isset($_GET['id']))//si recibe una variable por get llamada 'id'
{
    $id=$_GET['id'];
    $sql="select * from cliente where id=".$id;
}

$result=$mysqli->query($sql);//hace la consulta en la BD
if(mysqli_num_rows($result)>0)//si trajo registro
{
    $registros=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // conv los reg en array asociativos
    echo json_encode($registros);// {'id':1,'nombres':'pedro'}
}
else
{
    echo json_encode($respuesta);//{'codigo':'-1','mensaje':'No hay reg'}
}
?>