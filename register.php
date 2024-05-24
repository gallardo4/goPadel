<?php
include("components/include/nav.php")
?>

    <section class="formularios">
        <h2>Registrarse</h2> 

        <form action="./components/api/afegirUser.proc.php" method="POST" enctype="multipart/form-data" onsubmit="return validarContrasena();" class="formularioVerde1">
            <table>
                <tr>
                    <td><input type="text" name="usu_nom" size="20" placeholder="Nombre"></td>
                </tr>
                <tr>
                    <td><input type="text" name="usu_apellido" size="20" placeholder="Apellido"></td>
                </tr>
                <tr>
                    <td><input type="email" name="usu_mail" size="20" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="tel" name="usu_telf" size="20" placeholder="Teléfono"></td>
                </tr>
                <tr>
                    <td><input type="password" name="usu_contra" size="20" placeholder="Contraseña"></td>
                </tr>
                <tr>
                    <td>
                        <select name="usu_genero">
                            <option value="" disabled selected>Género</option>
                            <option value="M">Hombre</option>
                            <option value="F">Mujer</option>
                            <option value="0">Otro</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="usu_nivel">
                            <option value="" disabled selected>Nivel de Padel</option>
                            <option value="c">c</option>
                            <option value="c+">c+</option>
                            <option value="b">b</option>
                            <option value="b+">b+</option>
                            <option value="a">a</option>
                            <option value="Profesional">Profesional</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="usu_img" id="usu_img">
                    </td>
                </tr>
                <tr>
                    <td><br><input class="añadirComentario" type="submit" value="Registrarse"></td>
                </tr>
            </table>
        </form>
    </section>

    <script>
        function validarContrasena() {
            var contrasena = document.getElementById("usu_contra").value;
            var mayuscula = /[A-Z]/;
            var numero = /[0-9]/;
            var caracterEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
            
            if (contrasena.length < 8 || contrasena.length > 20) {
                alert("La contraseña debe tener entre 8 y 20 caracteres.");
                return false;
            }
            if (!mayuscula.test(contrasena)) {
                alert("La contraseña debe contener al menos una letra mayúscula.");
                return false;
            }
            if (!numero.test(contrasena)) {
                alert("La contraseña debe contener al menos un número.");
                return false;
            }
            if (!caracterEspecial.test(contrasena)) {
                alert("La contraseña debe contener al menos un caracter especial.");
                return false;
            }
            return true;
        }
    </script>

<?php
include("components/include/footer.html")
?>