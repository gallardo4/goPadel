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

        <form action="./components/api/inscribirEquipoTorneo.proc.php" method="GET" class="formularioVerde1">
            <table>
                
                <tr>
                    <td>
                        <select class="anyadirComentario" id="selectEquipos" name="equipos">

                        </select>
                    </td>
                </tr> 

                <tr>
                    <td>
                        <select class="anyadirComentario" id="selectTorneo" name="torneos">

                        </select>
                        <br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input class="anyadirComentario" type="submit" value="Enviar">
                    </td>
                </tr>

            </table>
        </form>

    </section>

    <script>

    fetch("components/api/verEquipos.proc.php?usu_id_1=<?php echo $_SESSION['usu_id'] ?>")
        .then(response => response.json())
        .then(data => {
            console.log(data)

            if(data.length==0){
                window.location="./crearEquipo.php?msg=No tienes equipo! Crea uno."
            }            

            data.forEach(e => {
                let select = document.getElementById("selectEquipos");
                let optionEquipo = document.createElement("option");
                optionEquipo.innerHTML = `<option> ${e.equipo_id} - ${e.equipo_nombre} </option>`;

                select.appendChild(optionEquipo)
            });
        });    

        fetch("components/api/verTorneos.proc.php")
        .then(response => response.json())
        .then(torneo => {
            console.log(torneo)           

            torneo.forEach(t => {
                let select = document.getElementById("selectTorneo");
                let optionTorneo = document.createElement("option");
                optionTorneo.innerHTML = `<option value=${t.torneo_id}>${t.torneo_id} - ${t.torneo_nom} </option>`;

                select.appendChild(optionTorneo)
            });
        });    
        
    </script>
<?php

}

if(isset($_GET['msg'])){
    echo "<br><p>$_GET[msg]</p>";
}
include("components/include/footer.html");
?>