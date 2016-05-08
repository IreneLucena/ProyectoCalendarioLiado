function registrar()
        {
            var nickname= document.getElementById("nick").value;
            var pass= document.getElementById("password").value;
            var pass2= document.getElementById("password2").value;
            var email= document.getElementById("correo").value;
            
            var nickCorrecto=false;
            var passCorrecta= false;
            var emailCorrecto= false;
            
            if(/^\w{3,30}$/.test(nickname))
            {
                nickCorrecto=true;
            }
            
            if(/^(?=.*\d)(?=.*[a-zA-Z])(\W*).{6,10}$/.test(pass))
            {
                if(pass==pass2)
                {
                    passCorrecta=true;
                }

            }
            
            if(/^\w+([\-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))
            {
                emailCorrecto=true;
            }  

            if(nickCorrecto && passCorrecta && emailCorrecto)
            {
				document.getElementById("res").value= true;
            }   
            
        }