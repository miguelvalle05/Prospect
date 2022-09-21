<?
function grabaprospecto($nombre,$asignadoa,$comosentero,$telefono,$mayoreomenu,$Empresa,$mediocon,$SESUsuario,$Estado,$detalles,$celular,$email,$schedule,$investment){
   
    $conexion = conectar();
    
    ///Obtenemos el Estado registrado por el ID
    $consultaestado="SELECT * FROM estados WHERE Estado = '$Estado';";
    $result2 = $conexion->query($consultaestado);
    
    while($row = $result2->fetch_assoc()){
            $Estado=$row['Descripcion'];
        }
        
    ///Obtenemos el Estado registrado por el mes grabado
    $fechaComoEntero = strtotime(date('Y-m-d'));
    $mes = date("m",$fechaComoEntero);
    
    switch($mes){
        case 1: $mes="Enero";break;
        case 2: $mes="Febrero";break;
        case 3: $mes="Marzo";break;
        case 4: $mes="Abril";break;
        case 5: $mes="Mayo";break;
        case 6: $mes="Junio";break;
        case 7: $mes="Julio";break;
        case 8: $mes="Agosto";break;
        case 9: $mes="Septiembre";break;
        case 10: $mes="Octubre";break;
        case 11: $mes="Noviembre";break;
        case 12: $mes="Diciembre";break;
    }
    
    ///Obtenermos el nombre del usuario 
    $consultanombreuser="SELECT * FROM usuarios WHERE `Usuario` = '$SESUsuario';";
    $result2 = $conexion->query($consultanombreuser);
    
    while($row = $result2->fetch_assoc()){
        $nombreuser=$row['Nombre'];
    }
        
    ///Obtenermos el nombre del Agente 
    $nombreagente="SELECT * FROM agentes WHERE `Agente` = '$asignadoa';";
    $result2 = $conexion->query($nombreagente);
    
    while($row = $result2->fetch_assoc()){
        $asignadoa=$row['Nombre'];
        $emailagente=$row['Email'];
    }	
    
    
    ///Obtenemos como se entero
    $nombrecomose="SELECT * FROM comosentero_ap WHERE `Id` = '$comosentero';";
    $result2 = $conexion->query($nombrecomose);
    
    while($row = $result2->fetch_assoc()){
        $comosentero=$row['Descripcion'];
    }
        
    ///Obtenemos nos contacto por
    $nombremediocon="SELECT * FROM mediocontacto_ap WHERE `Id` = '$mediocon';";
    $result2 = $conexion->query($nombremediocon);
    
    while($row = $result2->fetch_assoc()){
        $mediocon=$row['Descripcion'];
    }

    if (isset($nombre) && !empty($nombre) || isset($telefono) && !empty($telefono) || isset($Estado) && !empty($Estado) || isset($mayoreomenu) && !empty($mayoreomenu) || isset($asignadoa) && !empty($asignadoa) || isset($comosentero) && !empty($comosentero) || isset($mediocon) && !empty($mediocon)) {
        $insertar="INSERT INTO prospectos_ap (ID_p,Nombre_p,Telefono,Empresa,Estado,como_se_entero,AsignadoA,Registradopor,mayoreo_menudeo,Medio,Comentarios_adicionales,Fecha_registro,Mes,celularwhat,email,horario,inversion,estatus) 
        VALUES (NULL,'$nombre','$telefono','$Empresa','$Estado','$comosentero','$asignadoa','$nombreuser','$mayoreomenu','$mediocon','$detalles','".date('Y-m-d')."','$mes',$celular,'$email','$schedule','$investment','Sin contactar');";
        
        //echo $insertar;
        $result3 = $conexion->query($insertar);
        
        if($mayoreomenu)$Mayoreo="Mayoreo";
        else $Mayoreo="Menudeo";


        if($investment)$Inversion="Mas de 7500";
        else $Inversion="Menos de 7500";
        
        //send email
        
        $subject=" $Mayoreo";
        $message="Nombre:$nombre <br /> 
        Celular o WhatsApp:$celular
        <br />Email:$email
        <br />Telefono:$telefono 
        <br /> Empresa: $Empresa 
        <br /> Estado: $Estado 
        <br /> Inversion: $Inversion <br />
        Horario de Contacto: $schedule <br /> 
        Asignado a: $asignadoa <br />
        Nos contacto mediante: $mediocon <br /> 
        Mas informacion: $detalles ";
        
        $valsend=send_mail($emailagente,$nombre,$subject,$message);
        $insertar=$insertar.$valsend.$insertar;
        
        return $insertar;
    }
}


function send_mail($emailagente,$nombre,$subject,$message){
	require_once('../utiles/phpmailer/class.phpmailer.php');
	 
	$mail = new PHPMailer();
	$mail->SetLanguage("en", '../utiles/phpmailer/language/');	
	$mail->ClearAllRecipients( );
	
	$mail->From = "from@example.com";
			
	$mail->AddAddress("$emailagente");
	$mail->AddCC("cc@example.com");
	$mail->IsSMTP();    // send via SMTP
	$mail->SMTPAuth = true;
	$mail->IsHTML(true);
	$mail->Host       = "smtp.example.com";
	$mail->Username   = "user@example.com";
	$mail->Password   = "secret";
	$mail->Port       = 465;
	$mail->Subject = "Nuevo Prospecto-".$nombre."-".$subject;
	$mail->Body = "$message";
	if($mail->Send()) {
			 $resultado="Correo Enviado";
			} else {
			 $resultado="Error al enviar correo";
			
		};

		$resultado.=$enviaAlt;
	return $resultado;
			}
?>