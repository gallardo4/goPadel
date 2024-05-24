<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

?>

    <h2>¡<a class="iniciaSesion" href="login.php">Inicia sesión</a> para inscribirte en torneos!</h2>

<?php

} else {

?>
    <section class="formularios">
    <h2>Inscripción Torneo</h2>

        <form action="pagarClase.php" method="POST" class="formularioVerde">
            <table>
                <tr>
                    <td><input type="nombre" name="usu_nom" size="20" placeholder="Nombre"></td>
                </tr>
                <tr>
                    <td><input type="nombre" name="pareja" size="20" placeholder="Nombre Pareja"></td>
                </tr>
                <tr>
                    <td><input type="email" name="usu_mail" size="20" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="date" name="clas_fecha" size="20" placeholder="Fecha"></td>
                </tr>
                <tr>
                    <td>
                        <select name="clas_nivel">
                            <option value="" disabled selected>Nivel de dificultad</option>
                            <option value="professional">professional</option>
                            <option value="a">a</option>
                            <option value="b+">b+</option>
                            <option value="b">b</option>
                            <option value="c+">c+</option>
                            <option value="c">c</option>
                        </select>
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td><input class="añadirComentario" type="submit" value="Inscribirse"></td>
                </tr>
            </table>
        </form>

    </section>

<?php
}

include("components/include/footer.html");
?>