<?php
include("components/include/nav.php");

include("components/include/database.php");

if (!isset($_GET['usu_id'])) {
    die("No se especificó ningún usuario.");
}

$usu_id = intval($_GET['usu_id']);
?>

<section>
    <h2>Comentarios del usuario</h2>

    <section>
        <table class="tablaProfYRank" id="tablaComentarios" border="1">

        
        </table>

        <br>
    </section>
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