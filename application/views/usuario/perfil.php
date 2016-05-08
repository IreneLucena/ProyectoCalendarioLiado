<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">
        fieldset{
            width: 50px;
        }
    </style>
    <script type="text/javascript">
        function modify(){
            var nickname= document.getElementById("nick").value;
            var pass= document.getElementById("passwordNueva").value;
            var pass2= document.getElementById("password2").value;
            var email= document.getElementById("correo").value;
            
            var nickCorrecto=false;
            var passCorrecta= false;
            var emailCorrecto= false;

            var nickVacio= false;
            var passVacia= false;
            var emailVacio= false;
            
            if(/^\w{3,30}$/.test(nickname)){
                nickCorrecto=true;
            }
            if(nickname=="" || nickname==null){
				nickVacio= true;
            }
            if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass)){
                if(pass==pass2){
                    passCorrecta=true;
                }
            }
            if(pass=="" || pass==null){
				passVacia= true;
            }
            if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)){
                emailCorrecto=true;
            }
            if(email=="" || email==null){
				emailVacio= true;
            }  
            if(nickCorrecto && passCorrecta && emailCorrecto){
				document.getElementById("res").value= true;
            }   
            else if(nickVacio || passVacia || emailVacio){
				document.getElementById("res").value= true;
				if(emailVacio){
					document.getElementById("res").value= "noCorreo";
				}
            }
            else{
				document.getElementById("res").value= false;
            }
        }
    </script>
</head>
<body>
    <form action="<?=base_url('usuario/perfilPost')?>" method="post">
        <fieldset>
            <!-- Nombre <input type="text" name="nombre" readonly/><br><br> -->
            <!-- Apellidos <input type="text" name="apellidos" readonly/><br><br> -->
            Nick <input type="text" id="nick" name="nick"/><br><br>
            Contrase&ntilde;a actual <input type="password" id="passwordActual" name="passwordActual"/><br><br>
            Contrase&ntilde;a nueva <input type="password" id="passwordNueva" name="passwordNueva"/><br><br>
            Repite la nueva contrase&ntilde;a <input type="password" id="password2" name="password2"/><br><br>
            Correo <input type="text" id="correo" name="correo"/><br><br>
            <input type="text" id="res" name="res" hidden/>
            
            <input type="submit" value="Modificar" onclick="modify()"/><br><br>
        </fieldset>
    </form>
    </br>
	
	Hola <?php echo $idUsuario?>

</body>
</html>