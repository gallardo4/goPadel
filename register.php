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
                <td><input class="anyadirComentarioTexto" type="password" id="usu_contra" name="usu_contra" size="20" required placeholder="Contraseña" oninput="validarContrasena()"></td>
            </tr>
            <tr>
                <td id="passwordRequisitos">
                    <p id="reqLongitud">La contraseña debe tener entre 8 y 20 caracteres.</p>
                    <p id="reqMayuscula">Debe contener al menos una letra mayúscula.</p>
                    <p id="reqMinuscula">Debe contener al menos dos letras minúsculas.</p>
                    <p id="reqNumero">Debe contener al menos un número.</p>
                </td>
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
                        <option value="" disabled selected>Nivel de Pádel</option>
                        <option value="c">c</option>
                        <option value="c+">c+</option>
                        <option value="b">b</option>
                        <option value="b+">b+</option>
                        <option value="a">a</option>
                        <option value="P">professional</option>
                    </select><br>
                </td>
            </tr>
            <tr>
                <td><input class="anyadirComentario" type="file" name="perfilImg" id="perfilImg"><br></td>
            </tr>
            <tr>
                <td><br><input class="anyadirComentario" type="submit" value="Registrarse"><br></td>
            </tr>
            <tr>
                <?php

                if (isset($_REQUEST['msg'])) {
                    echo "<h5>" . $_REQUEST['msg'] . "</h5>";
                }

                ?>
            </tr>
        </table>
    </form>
</section>

<script>
    function validarContrasena() {
        const password = document.getElementById("usu_contra").value;

        const reqLongitud = document.getElementById("reqLongitud");
        const reqMayuscula = document.getElementById("reqMayuscula");
        const reqMinuscula = document.getElementById("reqMinuscula");
        const reqNumero = document.getElementById("reqNumero");

        if (password.length >= 8 && password.length <= 20) {
            reqLongitud.style.display = "none";
        } else {
            reqLongitud.style.display = "list-item";
        }

        const tieneMayuscula = /[A-Z]/.test(password);
        if (tieneMayuscula) {
            reqMayuscula.style.display = "none";
        } else {
            reqMayuscula.style.display = "list-item";
        }

        const tieneMinusc = (password.match(/[a-z]/g) || []).length >= 2;
        if (tieneMinusc) {
            reqMinuscula.style.display = "none";
        } else {
            reqMinuscula.style.display = "list-item";
        }

        const tieneNumero = /[0-9]/.test(password);
        if (tieneNumero) {
            reqNumero.style.display = "none";
        } else {
            reqNumero.style.display = "list-item";
        }
    }

    function comprovarContrasenya(event) {
        validarContrasena();

        const reqs = document.querySelectorAll("#passwordRequisitos p");
        for (let req of reqs) {
            if (req.style.display !== "none") {
                event.preventDefault();
                window.location = "./register.php?msg=La contraseña no cumple con todos los requisitos.";
                break;
            }
        }
    }
</script>

<?php
include("components/include/footer.html")
?>
