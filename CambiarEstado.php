<?php
require_once'conectar.php';


if((isset($_REQUEST['idreporte'])) && (isset($_REQUEST['ordenanza'])) && (isset($_REQUEST['idestadoactual']))){
	
$idreporte=$_REQUEST['idreporte'];
$ordenanza=$_REQUEST['ordenanza'];
$idestadoactual=$_REQUEST['idestadoactual'];

$conectarnos=new conectar();
$respuesta=array();

$procedimiento=$conectarnos->prepare('call CambiarEstado(:idreporte,:ordenanza,:idestadoactual)');
$procedimiento->bindParam(':idreporte',$idreporte);
$procedimiento->bindParam(':ordenanza',$ordenanza);
$procedimiento->bindParam(':idestadoactual',$idestadoactual);

$procedimiento->execute();

$registro=$procedimiento->fetch();
$respuesta['cambiarestadodata'][]=array("Resultado"=>$registro['respuesta']);

print json_encode($respuesta);

}
?>