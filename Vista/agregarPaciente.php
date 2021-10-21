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
            
            <div class="col s5 push-s7">
                     <label for="fechaRegitro">Fecha de registro:</label>
                     <input type="date" placeholder="dd/mm/aa" id=fechaRegitro>
            </div>

            <input type="text" id="fname" name="firstname" placeholder="Ingrese nombre...">
            <input class="col s5" type="text" id="lname" name="lastname" placeholder="Ingrese apellido paterno...">
            <input class="col s5 offset-s2" type="text" id="lname" name="lastname" placeholder="Ingrese apellido materno...">
            
            
            <!--Ajuste de la edad y fechaNacimiento-->
                
            <div class="row">
                <div class="col s5 push-s7">
                     <label for="fechaNacimiento">Fecha de nacimiento:</label>
                     <input type="date" placeholder="dd/mm/aa" id=fechaNacimiento>
                </div>
                <div class="col s4 pull-s5">
                <label for="edad">Edad:</label>
                    <input type="number" min=0 max=100 id="edad">      
                </div>
           </div>

            <!---Sección del genero--->
            <div class="col s12 m6">
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
            <!----------------------------->

            <!---Sección del expediente medico-->
            <p class="col s12">Diagnostico</p>
            <textarea name="diagnostico" style="height:50px;">
            </textarea> 

            <p class="col s12">Sintomas</p>
            <textarea name="diagnostico" style="height:100px;">
            </textarea> 

            <p class="col s12">Receta</p>
            <textarea name="receta" style="height:100px;">
            </textarea> 
            <br><br>
            <!----------------------------------->

            <input type="submit" value="Cancelar" class="col s3 offset-s5">
            <input type="submit" value="Registrar" class="col s3 offset-s1">
        </form>
    </div>
<?php
    }
?>