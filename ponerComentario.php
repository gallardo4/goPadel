<?php
include("components/include/nav.php");

include("components/include/database.php");

if (!isset($_GET['usu_id'])) {
    die("No se especificó ningún usuario.");
}

$usu_id = intval($_GET['usu_id']);
?>

<section>
    <h2>Añadir Comentario</h2>

<?php
    $sql = "SELECT texto_comentario FROM COMENTARIOS WHERE alumn_id = $usu_id";
    $result = $conn->query($sql);
?>

<section>
    <h3>Comentarios del Usuario</h3>
    <table class="tablaProfYRank" id="tablaComentarios" border="1">

       
    </table>

    <br>
</section>

    <form action="./components/api/ponerComentario.proc.php" method="POST">
        <input type="hidden" name="alumn_id" value="<?php echo $usu_id; ?>">
        <table>
            <tr>
                <td><textarea class="anyadirComentarioTexto" name="comentario" placeholder="Añade un comentario" rows="15" cols="100"></textarea><br><br></td>
            </tr>
            <tr>
                <td><input class="anyadirComentario" type="submit" value="Añadir"></td>
            </tr>
        </table>
    </form>
</section>

<script>
    fetch(`./components/api/verComentarios.proc.php?alumnID=<?php echo $_GET['usu_id']; ?>`)
            .then(response=>response.json())
            .then(comData => {

                if(comData.length!=0){
                    const tablaComentarios = document.getElementById('tablaComentarios');
                    tablaComentarios.innerHTML = ''; 
                    comData.forEach(comentario => {
                        console.log(comentario)
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td> ${comentario.texto_comentario}</td>
                    `;
                    tablaComentarios.appendChild(row);
                })
                }else{
                    const tablaComentarios = document.getElementById('tablaComentarios');
                    tablaComentarios.innerHTML = '';
                    const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="3">No tienes ningun comentario</td>
                        `;
                        tablaComentarios.appendChild(row);
                }
                
        })
</script>

<?php
$conn->close();
include("components/include/footer.html");
?>
