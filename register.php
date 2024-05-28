<?php
include("components/include/nav.php")
?>

    <section class="formularios">
        <h2>Registrarse</h2> 

        <form action="./components/api/afegirUser.proc.php" onsubmit="comprovarContrasenya(event)" method="POST" enctype="multipart/form-data" class="formularioVerde1">
            <table>
                <tr>
                    <td><input class="anyadirComentarioTexto" type="text" name="usu_nom" size="20" placeholder="Nombre" required></td>
                </tr>
                <tr>
                    <td><input class="anyadirComentarioTexto" type="text" name="usu_apellido" size="20" placeholder="Apellido" required></td>
                </tr>
                <tr>
                    <td><input class="anyadirComentarioTexto" type="email" name="usu_mail" size="20" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><input class="anyadirComentarioTexto" type="tel" name="usu_telf" size="20" placeholder="Teléfono" required></td>
                </tr>
                <tr>
                    <td><input class="anyadirComentarioTexto" type="password" id="usu_contra" name="usu_contra" size="20" required placeholder="Contraseña"></td>
                </tr>
                <tr>
                    <td>
                        <select class="anyadirComentario" name="usu_genero" required>
                            <option value="" disabled selected>Género</option>
                            <option value="M">Hombre</option>
                            <option value="F">Mujer</option>
                            <option value="0">Otro</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="anyadirComentario" name="usu_nivel" required>
                            <option value="" disabled selected>Nivel de Padel</option>
                            <option value="c">c</option>
                            <option value="c+">c+</option>
                            <option value="b">b</option>
                            <option value="b+">b+</option>
                            <option value="a">a</option>
                            <option value="P">Profesional</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td><input class="anyadirComentario" type="file" name="perfilImg" id="perfilImg"><br></td>
                </tr>
                <tr>
                    <td><br><input class="anyadirComentario" type="submit" value="Registrarse"></td>
                </tr>
            </table>
        </form>
    </section>

    <script>

        function comprovarContrasenya(event){
            let inputPassword = document.getElementById("usu_contra");

            let password = inputPassword.value;

            let longitud = false;
            let mayusculas = false;
            let minusculas = false;
            let numeºros = false;


            longitud = comprovarLongitud(password);
            mayusculas = comprovarMayus(password);
            minusculas = comprovarMins(password);
            numeros = comprovarNums(password);


            if(!longitud){
                event.preventDefault();
                alert("la contraseña es demasiado corta")
            }

            if(!mayusculas){
                event.preventDefault();
                alert("Tiene que tener minimo una mayuscula.")
            }

            if(!minusculas){
                event.preventDefault();
                alert("Tiene que tener minimo 2 minusculas.")
            }

            if(!numeros){
                event.preventDefault();
                alert("Tiene que tener minimo 1 numero.")
            }

            

        }

        function comprovarLongitud(contraseña){
            longitudPalabra = contraseña.length;

            if(longitudPalabra<=20 && longitudPalabra>=8){
                return true;
            }
            return false;
        }

        function comprovarMayus(contraseña){
            var contador = 0;

            for (let i = 0; i < contraseña.length; i++) {
                if (contraseña[i]==contraseña[i].toUpperCase() && isNaN(contraseña[i])) {
                    contador++;
                }
            }

            console.log(contador);
            
            if(contador>0){
                return true
            }

            return false
        }

        function comprovarMins(contraseña){
            var contador = 0;

            for (let i = 0; i < contraseña.length; i++) {
                if (contraseña[i]==contraseña[i].toLowerCase() && isNaN(contraseña[i])) {
                    contador++;
                }
            }
            console.log(contador);

            if(contador>=2){
                return true
            }
            return false
        }

        function comprovarNums(contraseña){
            var num = 0;
            for (let i = 0; i < contraseña.length; i++) {
                if (!isNaN(contraseña[i])) {
                    num++;
                }
            }
            if(num>0){
                return true
            }
            return false    
        }

    </script>

<?php
include("components/include/footer.html")
?>