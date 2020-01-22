<?php
require_once'conectar.php';
header('Content-Type: application/json');
header('Content-Type: text/html; charset=utf-8');


if((isset($_REQUEST['iduserordenanza'])) & (isset($_REQUEST['pass']))){
	
$iduserOrdenanza=$_REQUEST['iduserordenanza'];
$pass=$_REQUEST['pass'];



$conectarnos=new conectar();
$respuesta=array();

$procedimiento=$conectarnos->prepare('call verificar_ordenanza(:iduserOrdenanza,:pass)');
$procedimiento->bindParam(':iduserOrdenanza',$iduserOrdenanza);
$procedimiento->bindParam(':pass',$pass);
$procedimiento->execute();


$registro=$procedimiento->fetch();

$respuesta['datosOrdenanza'][]=array("iduserordenanza"=>$registro['iduserOrdenanza'],"idedificio"=>$registro['idEdificio']);


print json_encode($respuesta);

}
?>