<?php
include("components/include/nav.php");
?>
    <h2>Ranking - Top 10</h2>
    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>
                <th>Imágen Perfil</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody id="empresa-table">
        </tbody>
        <tfoot id="empresa-table-foot">
        </tfoot>
    </table>
    <script>
        // Realizar una solicitud GET al archivo PHP con el valor como parámetro
        fetch(`./components/api/verUsuarios.proc.php?max=10`)
        .then(response => response.json())
        .then(data => {
            // Actualizar la tabla con las empresas obtenidas
            const empresaTable = document.getElementById('empresa-table');
            empresaTable.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            data.forEach(usuario => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img src='components/pfpImg/${usuario.usu_img}'></td>
                    <td>${usuario.usu_apellido}</td>
                    <td>${usuario.usu_nom}</td>
                    <td>${usuario.usu_nivel}</td>
                    <td>${usuario.usu_puntuacion}</td>
                `;
                empresaTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });

        <?php

        if (isset($_REQUEST['msg'])) {

            ?>

            alert("<?php echo $_REQUEST['msg']; ?>");

            <?php

        }

        ?>

    </script>

<?php
include("components/include/footer.html");
?>