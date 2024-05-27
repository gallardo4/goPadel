<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

    header("location: index.php");

}

?>

    

    <h2>Lista de pistas</h2>
    <br>
    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>                
                <th>Nombre</th>
                <th>Numero de pista</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Gestión</th>
            </tr>
        </thead>
        <tbody id="tablaReserva">
        </tbody>
        <tfoot id="tablaReserva-foot">
        </tfoot>
    </table>
    <script>
        // Realizar una solicitud GET al archivo PHP con el valor como parámetro
        fetch(`./components/api/verReservas.proc.php?type=pista`)
        .then(response => response.json())
        .then(data => {

            console.log(data);
            // Actualizar la tabla con las empresas obtenidas
            const tablaReserva = document.getElementById('tablaReserva');
            tablaReserva.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            data.forEach(pista => {
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${pista.nombre_usuario} ${pista.apellido_usuario}</td>
                    <td>Num. ${pista.pista_id}</td>
                    <td>${pista.fecha_dia}</td>
                    <td>${pista.hora}</td>
                    <td><a class="añadirComentario" href="./components/api/borrarReservaPista.proc.php?pista_id=${pista.pista_id}&usu_id=${pista.usu_id}&hora=${pista.hora}">Borrar Reserva</td>
                    
                `;
                tablaReserva.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });

    </script>

<?php

include("components/include/footer.html");
?>