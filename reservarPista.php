<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

?>

    <h2>¡<a class="iniciaSesion" href="login.php">Inicia sesión</a> para reservar pistas!</h2>

<?php

} else {

?>

    <section class="formularios">
        <h2>Reservar Pista</h2>

        <form action="recepcionReservaPista.php" method="POST" class="formularioVerde">
            <table>
                <tr>
                    <td><input class="añadirComentarioTexto" type="number" name="pista_id" max="10" min="1" placeholder="Pista" required></td>
                </tr>
                <tr>
                    <td><input class="añadirComentario" type="date" name="res_fecha" size="20" placeholder="Fecha" required></td>
                </tr>
                <tr><td>

                <input type="hidden" value="40" name="precio_pista"><br>
                <label for="precio_pista">2h - 40€</label>
                </td></tr>
                <tr><td>
                <p>HORARIOS:</p>
                <input type="radio" id="1" name="hora" value="8">
                <label for="1">8-10</label><br>

                <input type="radio" id="2" name="hora" value="10">
                <label for="2">10-12</label><br>

                <input type="radio" id="3" name="hora" value="12">
                <label for="3">12-14</label><br>

                <input type="radio" id="4" name="hora" value="16">
                <label for="4">16-18</label><br>  

                <input type="radio" id="5" name="hora" value="18">
                <label for="5">18-20</label><br><br>
                </td></tr>
                <tr> 
                <td><input class="añadirComentario" type="submit" value="Reservar"></td>
                </tr>

            </table>
        </form>
    </section>

<?php
}

include("components/include/footer.html");
?>