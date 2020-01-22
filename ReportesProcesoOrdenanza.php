<?php

require_once('conectar.php');
if(isset($_REQUEST['iduserordenanza'])){
	

	$iduserordenanza=$_REQUEST['iduserordenanza'];
	$json=array();
	
	$conectado= new conectar();
		$sentencia=$conectado->prepare('call reportes_ProcesoUsuario(:iduserordenanza)');
		$sentencia->bindParam(':iduserordenanza',$iduserordenanza);
		
		$insert=$sentencia->execute();

		while($rep=$sentencia->fetch()){
			
			$result['idreporte']=$rep['idimeg'];
			$result['idestado']=$rep['idestado'];
			$result['titulo']=$rep['titulo'];
			$result['descripcion']=$rep['descripcion'];
			$result['imagen']=$rep['imagen'];
			$result['tipo']=$rep['tipo'];
			$result['edificio']=$rep['edificio'];
			$result['estado']=$rep['estado'];
			$result['ordenanza']=$rep['ordenanza'];
			$result['nombreordenanza']=$rep['nombreordenanza'];
			$json['reportesbyedificio'][]=$result;
		}
		
		echo json_encode($json);
}
else{
	
	
	echo'Error al cargar datos';
}












?>