<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

    header("location: index.php");

}

?>

    

    <h2>Lista de clases</h2>
    <br>
    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>                
                <th>Profesor</th>
                <th>Alumno</th>
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
        fetch(`./components/api/verReservas.proc.php?type=clase`)
        .then(response => response.json())
        .then(data => {

            console.log(data);
            // Actualizar la tabla con las empresas obtenidas
            const tablaReserva = document.getElementById('tablaReserva');
            tablaReserva.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            data.forEach(clase => {
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${clase.nombre_profesor} ${clase.apellido_profesor}</td>
                    <td>${clase.nombre_alumno} ${clase.apellido_alumno}</td>
                    <td>Num. ${clase.pista_id}</td>
                    <td>${clase.fecha_dia}</td>
                    <td>${clase.hora}</td>
                    <td><a class="añadirComentario" href="./components/api/borrarReservaClase.proc.php?clase_id=${clase.clase_id}&usu_id=${clase.usu_id}&hora=${clase.hora}">Borrar Reserva</td>
                    
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