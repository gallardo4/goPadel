
<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

?>

    <h2>¡<a class="iniciaSesion" href="login.php">Inicia sesión</a> para reservar clases!</h2>

<?php

} else {

?>

<section class="formularios">
    <h2>Reservas Clases</h2>
        <table class="tablaProfYRank">
            <thead>
                <tr>
                    <th>Pista</th>
                    <th>Horas de clase</th>
                    <th>Nivel</th>
                    <th>Profesor</th>

                    <?php
                
                        if (isset($_SESSION['usu_id'])) {
                            ?>
                            <th>Fecha</th>
                            <?php
                        }

                ?>
                                  
                </tr>
            </thead>

            <tbody id="clasesTable">

            </tbody>


            <tfoot id="clasesTable-foot">

            </tfoot>

        </table>
</section>

<script>

    fetch(`./components/api/verClases.proc.php`)
        .then(response => response.json())
        .then(claseData => {
            const claseTable = document.getElementById('clasesTable');
            claseTable.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            let aux = 1;
            claseData.forEach(clase => {
                let form = "form"+aux
                console.log(clase)
                aux += 1
                const row = document.createElement('tr');
                row.innerHTML = `

                    <form id="${form}" method="GET" action="components/api/recepcionReservaClase.proc.php"><input type="hidden" name="id" value="1">                   
                        <input form="${form}" type="hidden" name="hora" value="${clase.clase_hora}">
                        <input form="${form}" type="hidden" name="nivel" value="${clase.clase_nivel}">
                        <input form="${form}" type="hidden" name="claseID" value="${clase.clase_id}">
                        <input form="${form}" type="hidden" name="pistaID" value="${clase.pistaID}">
                    </form> 

                    <td>${clase.pistaID}</td>                    
                    <td>${clase.clase_hora} - ${parseInt(clase.clase_hora)+2}</td>                    
                    <td>${clase.clase_nivel}</td>                    
                    <td>${clase.nombre_profesor} ${clase.apellido_profesor}</td>      

                    <?php
                
                        if (isset($_SESSION['usu_id'])) {
                            ?>
                                <td><input class="anyadirComentario" form="${form}" type="date" name="res_fecha" size="20" placeholder="Fecha" required></td>                    
                                <td><input class="anyadirComentario" form="${form}" type="submit" value="Apuntarse a esta clase"></td>  
                            <?php
                        }

                    ?>
                `;

                
                claseTable.appendChild(row);
            });
        })

</script>

<?php
}

include("components/include/footer.html");
?>