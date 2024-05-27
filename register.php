<?php
include("components/include/nav.php")
?>

    <section class="formularios">
        <h2>Registrarse</h2> 

        <form action="./components/api/afegirUser.proc.php" method="POST" enctype="multipart/form-data" class="formularioVerde1">
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
                    <td><input class="anyadirComentarioTexto" type="password" name="usu_contra" size="20" required placeholder="Contraseña"></td>
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
                <t>
                    <td><input class="anyadirComentario" type="file" name="perfilImg" id="perfilImg"><br></td>
                </tr>
                <tr>
                    <td><br><input class="anyadirComentario" type="submit" value="Registrarse"></td>
                </tr>
            </table>
        </form>
    </section>


<?php
include("components/include/footer.html")
?>