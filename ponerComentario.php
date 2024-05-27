<?php
include("components/include/nav.php");

if (!isset($_GET['usu_id'])) {
    die("No se especificó ningún usuario.");
}

$usu_id = intval($_GET['usu_id']);
?>

<section>
    <h2>anyadir Comentario</h2>

    <form action="./components/api/ponerComentario.proc.php" method="POST">
        <input type="hidden" name="alumn_id" value="<?php echo $usu_id; ?>">
        <table>
            <tr>
                <td><textarea name="comentario" placeholder="Añade un comentario" rows="15" cols="100"></textarea><br><br></td>
            </tr>
            <tr>
                <td><input type="submit" value="anyadir"></td>
            </tr>
        </table>
    </form>
</section>

<?php
include("components/include/footer.html");
?>
