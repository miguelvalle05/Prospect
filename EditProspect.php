<HTML>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prospect Edit</title>
    <script language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>

<div class="container">


        <h1 class="title has-text-centered">Prospect Edit</h1>
     
		
<?php 
	include("Conn.php");
    include("Fuctions.php");
	require_once("../utiles/GlobalFunctions.php");
				
	$conexion = conectar();
    $us=$SESUsuario;
    $programa=10010;
    $nivel = niveluser($programa,$us);
    $generarepo = $_GET['descargar']; 

    if($_GET["formulario"]=='ok'){

        

        $html="<div class=\"card p-3\">
        <p class=\"text-success\">Actualizado correctamente!</p>
        <p>
        Nombre: ".$_GET['name']."</br>
        Empresa: ".$_GET['business']."</br>
        Telefono: ".$_GET['tel']."</br>
        Celular: ".$_GET['cel']."</br>
        Email: ".$_GET['email']."</br>
        
        
        </p>
        
        </div>";


        $name = $_GET['name'];
        $business = $_GET['business'];
        $tel = $_GET['tel'];
        $cel = $_GET['cel'];
        $email = $_GET['email'];
        $state = $_GET['state'];
        $agent = $_GET['agent'];
        $media= $_GET['media'];
        $contact= $_GET['contact'];
        $sale=$_GET['sale'];
        $investment=$_GET['investment'];
        $schedule=$_GET['schedule'];
        $details=$_GET['details'];
        $account=$_GET['account'];
        $datefac=$_GET['datefac'];
        $amount=$_GET['amount'];
        $fac=$_GET['fac'];
        $customer=$_GET['customer'];
        $atatus=$_GET['status'];

      


		$resultgab = updateprospect($customer,$name,$agent,$media,$tel,$sale,$business,$contact,$SESUsuario,$state,$details,$cel,$email,$schedule,$investment,$account,$datefac,$amount,$fac,$status);
								   
	

    }

    //echo $html;
						
?>

<form class="row g-3 needs-validation" id="frmGeneral" name="frmGeneral"  method="GET" novalidate>

<input type="hidden" name="formulario" value="ok"> 


 
            <div class="col-md-2">
            <label class="label">ID Cliente</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-id-card"></i></span>
            <input class="form-control" type="text" placeholder="ID Cliente" name="customer" id="customer" value="">
            </div>
            </div>

            <div class="col-md-2">
            <label class="label">Cuenta</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-invoice"></i></span>
            <input class="form-control" type="text" placeholder="Cuenta" name="account" id="account" value="">
            </div>
            </div>

            <div class="col-md-2">
            <label class="label">Fecha Factura</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-calendar-alt"></i></span>
            <input class="form-control" type="text" placeholder="Fecha Factura" name="datefac" id="datefac" value="">
            </div>
            </div>

            <div class="col-md-2">
            <label class="label">Monto Factura</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-coins"></i></i></span>
            <input class="form-control" type="text" placeholder="Monto Factura" name="amount" id="amount" value="">
            </div>
            </div>

            <div class="col-md-2">
            <label class="label">Folio Factura</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-key"></i></span>
            <input class="form-control" type="text" placeholder="Folio Factura" name="fac" id="fac" value="">
            </div>
            </div>

           


            

            
      
            <div class="col-md-6">
            <label class="label">Nombre</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-user"></i></span>
            <input class="form-control" type="text" placeholder="Nombre" name="name" id="name" value="" required>
 
            
                 <!-- Mensajes para validaci??n   -->
                <div class="valid-feedback">??Campo v??lido!</div>
                <div class="invalid-feedback">Porfavor ingresa un nombre.</div>
            </div>
            </div>

            <div class="col-md-6">
            <label class="label">Empresa</label>
            <div class="input-group mb-3">
                 <span class="input-group-text" id="basic-addon1">  <i class="fas fa-building"></i></span>
                <input class="form-control" type="text" placeholder="Empresa" name="business" id="business" value="">
               
            </div>

                <!-- Mensajes para validaci??n   
                <div class="valid-feedback">??Campo v??lido!</div>
                <div class="invalid-feedback">Porfavor ingresa una empresa.</div>-->
            </div>


            <div class="col-md-4">
            <label class="label">Telefono</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">  <i class="fas fa-phone"></i></span>
                <input class="form-control" type="tel" placeholder="Telefono" name="tel" id="tel" value="" minlength="10"  required>
                
        

                <!-- Mensajes para validaci??n   -->
                <div class="valid-feedback">??Campo v??lido!</div>
                <div class="invalid-feedback">Porfavor ingresa un telefono valido.</div>
               
                
            </div>
            </div>


            <div class="col-md-4">
            <label class="label">Celular o WhatsApp</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-whatsapp"></i></span>
                <input class="form-control" type="text" placeholder="Celular" name="cel" id="cel" value=""  minlength="10" >
                
           
                <!-- Mensajes para validaci??n   -->
                <div class="valid-feedback">??Campo v??lido!</div>
                <div class="invalid-feedback">Porfavor ingresa un celular valido.</div>
               
            </div>
            </div>

            <div class="col-md-4">
            <label class="label">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"> <i class="fas fa-envelope"></i></span>
                <input class="form-control" type="text" placeholder="Email" name="email" id="email" value="" >
                
                <!-- Mensajes para validaci??n   
                <div class="valid-feedback">??Campo v??lido!</div>
                <div class="invalid-feedback">Porfavor ingresa un email.</div>-->
               
            </div>
            </div>






        <div class="col-md-3">
        <label class="label">Estado</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">   <i class="fas fa-globe"></i></span>
            <select class="form-select" id="state" name="state" id="state" required >
            <option  selected disabled value="">Selecciona un Estado</option>
						
										<?php
											$result = $conexion->query("SELECT * FROM estados WHERE Pais = 138 ORDER BY Descripcion ASC");
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) { 
													echo '<option value="'.$row['Estado'].'">'.$row['Descripcion'].'</option>';
												}
											}
											?>
            </select>
       
            <div class="invalid-feedback">
            Porfavor selecciona un estado valido.
            </div>   
        </div>
        </div>

        <div class="col-md-5">
        <label class="label">Asignado a</label>
        <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon1">   <i class="fas fa-user"></i> </span>
            <select class="form-select" id="agent" name="agent" id="agent" required >
            <option  selected disabled value="">Selecciona un Agente</option>
						
                        <?php
                            $result = $conexion->query("SELECT * FROM agentes WHERE Estatus = 'A' AND ( Agente=2 or Agente=3 or Agente=25 or Agente=27 or Agente=39 or Agente=45 or Agente=47 or Agente=49 or Agente=51 or Agente=53 or Agente=54 or Agente=55) Order BY Nombre ASC");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { 
                                    echo '<option value="'.$row['Agente'].'">'.$row['Nombre'].'</option>';
                                }
                            }
                            ?>
             </select>
       
             <div class="invalid-feedback">
            Porfavor selecciona un agente valido.
            </div>
        </div>
        </div>

        <div class="col-md-3">
        <label class="label">Como se entero de nosotros</label>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">   <i class="fas fa-search-location"></i> </span>
        <select class="form-select" id="media" name="media" required >
            <option  selected disabled value="">Selecciona un Medio</option>
						
                        <?php
                            $result = $conexion->query("SELECT * FROM comosentero_ap ORDER BY Descripcion ASC");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { 
                                    echo '<option value="'.$row['Id'].'">'.$row['Descripcion'].'</option>';
                                }
                            }
                            ?>
            </select>
        
            <div class="invalid-feedback">
            Porfavor selecciona un medio valido.
            </div>
        </div>
       </div>

        <div class="col-md-3">
        <label class="label">Medio de contacto</label>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">   <i class="fas fa-comments"></i> </span>
        <select class="form-select" id="contact" name="contact" required >
            <option  selected disabled value="">Selecciona un Medio</option>
						
                        <?php
                            $result = $conexion->query("SELECT * FROM mediocontacto_ap ORDER BY Descripcion ASC");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { 
                                    echo '<option value="'.$row['Id'].'">'.$row['Descripcion'].'</option>';
                                }
                            }
                            ?>
            </select>
       
            <div class="invalid-feedback">
            Porfavor selecciona un medio valido.
            </div>
        </div>
        </div>

        <div class="col-md-3">
        <label class="label">Tipo de venta</label>

        <div class="form-check">
            <input type="radio" class="form-check-input" id="menudeo" name="sale" value=0 required>
            <label class="form-check-label" for="menudo">Menudeo</label>
        </div>
        <div class="form-check mb-3">
            <input type="radio" class="form-check-input" id="mayoreo" name="sale" value=1 required>
            <label class="form-check-label" for="mayoreo">Mayoreo</label>
            <div class="invalid-feedback">Ingresa una opcion de tipo de venta</div>
        </div>
        </div>

        <div class="col-md-3">
        <label class="label">Inversion</label>

        <div class="form-check">
            <input type="radio" class="form-check-input" id="masi" name="investment" value=1 >
            <label class="form-check-label" for="masi">Mas de 7500</label>
        </div>
        <div class="form-check mb-3">
            <input type="radio" class="form-check-input" id="meni" name="investment" value=0 >
            <label class="form-check-label" for="meni">Menos de 7500</label>
            <div class="invalid-feedback">Ingresa una opcion de inversion</div>
        </div>
        </div>

        <div class="col-md-3">
            <label class="label">Estatus</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-calendar-check"></i></span>
            <select class="form-select" id="status" name="status">
                <option   value="0" selected disabled >Estatus</option>
                <option value="1">Sin contactar</option>
                <option value="2">En cotizacion</option>
                <option value="3">Esperando repuesta</option>
                <option value="4">Cancelado</option>
                <option value="5">Venta concluida</option>
           
                </select>
            
               
            </div>
            </div>


        <div class="col-md-6">

      
        <label class="label">Horario de Contacto</label>
        <div class="control">
            <textarea class="form-control" rows="3" id="schedule" name="schedule" placeholder=""></textarea>
        </div>
        </div>

        <div class="col-md-6">
        <label class="label">Detalles</label>
        <div class="control">
            <textarea class="form-control" rows="3" name="details"  id="details" placeholder=""></textarea>
        </div>
        </div>

      

        

   
       

        <div class="col-12">
            <button class="btn btn-warning fw-bold float-end" id="btnSave" type="submit">Actualizar</button>
            
        </div>
        

       
</form>

            <div class="col-md-2">
            <label class="label"></label>
           
            <button id="btnSearch" name="btnSearch" type="submit" class="btn btn-primary">
							Buscar
						</button>
            
           

            <label class="label"></label>
           
            <button id="btnNewSearch" name="btnNewSearch" type="submit" class="btn btn-primary">
							Nueva Busqueda
						</button>

                        <label class="label"></label>
           
           <button id="btnDelete" name="btnDelete" type="submit" class="btn btn-danger">
                       Elminiar
                       </button>
           
            
            </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script language="javascript"src="./js/EditProspect.js" ></script>



</body>

</HTML>

