<?php
    /**Incluimos la plantilla medico donde almacenamos el navar y el footer*/
    include '../plantilla/plantillaMedico.php';
    function section(){
?>

    <style>
        
        #registroPaciente{
            width: 80%;
            margin-left:10%;
            margin-right: auto;
        }

        #registroPaciente input{
            text-align: center;
            height: 35px;
        }
        #registroPaciente label{
            color: black;
            font-size: 14px;
            height: 35;
            align-content: center;
            padding-top: 50%;
        }
        .contenedorForm{
            width: 60%;
            margin: 0 20% 0 20%;
            padding: 15px;
            border:1px solid white;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 1px 1px 1px black;
        }


    </style>

    <br><br>
    <div class="contenedorForm row">
         <h4 class="center-align">Registrar paciente</h4>
        <hr>

        <form id="registroPaciente">
            
            <div id="Fecha" class="col s12">   
               <div class="col s9 right-align" style="padding: 5px 0 5px 0;">
				    <label for="fecha">Fecha de registro:</label>
                </div>
                <input type="date" class="col s3 center-align" id="fechaRegistro" onclick="" placeholder="dd/mm/aa" class="mt-4 form-control">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            </div>

            <input type="text" id="fname" name="firstname" placeholder="Ingrese nombre...">
            <input class="col s5" type="text" id="lname" name="lastname" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="lname" name="lastname" placeholder="Ingrese apellido materno...">
            
            
            <!--Ajuste de la edad y genero-->
            <div class="edGenero col s12">

                <div class="col s5">
                    <div class="col s1 right-align" style="padding: 5px 0 5px 0;">
				        <label for="fecha">Edad:</label>
                    </div>
                    <input class="col s3 offset-s1 right-align" style="width:50%;" type="number" min=0 max=100>
                </div>
                
                
                <div class="col s5 offset-s2">
                    <div class="col s3">
				        <label for="hombre">Genéro</label>
                    </div>

                    <div class="col s1">
                        <input type="radio" id="masculino" name="genero" value="m">
				        <label for="masculino">M</label>
                    </div>
		
                    <div class="col s1 offset-s2">
                        <input type="radio" id="femenino" name="genero" value="f">
				        <label for="femenino">F</label>
                    </div>
                </div>

               
			</div>

            <p class="col s12">Datos domiciliarios</p>
            <input class="" type="text" id="direccion" name="Direccion" placeholder="Ingrese dirección...">

            <input class="col s5" type="text" id="ciudad" name="Ciudad" placeholder="Ingrese ciudad...">
            <input class="col s5 offset-s2" type="text" id="pais" name="Pais" placeholder="Ingrese país...">
            
            <p class="col s12">Información de contacto</p>
            <input class="col s12" type="text" id="telefono" name="Telefono" placeholder="Ingrese telefono...">
            <input class="col s12" type="text" id="email" name="Email" placeholder="Ingrese email...">

            <p class="col s12">Diagnostico</p>
            <textarea name="diagnostico" style="height:200px;">
            </textarea> 

            <p class="col s12">Receta</p>
            <textarea name="receta" style="height:200px;">
            </textarea> 
            <br><br>


            <input type="submit" value="Cancelar" class="col s3 offset-s5">
            <input type="submit" value="Registrar" class="col s3 offset-s1">
        </form>
    </div>
<?php
    }
?>