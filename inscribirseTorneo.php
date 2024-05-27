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
                    <td>
                        <select class="anyadirComentario" name="torneosDisponibles">

                        </select>
                        <br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <select class="anyadirComentario" name="tusEquipos">

                        </select>
                        <br><br>
                    </td>
                </tr>

            </table>
        </form>

    </section>

    <script>
        
    </script>
<?php
}

include("components/include/footer.html");
?>