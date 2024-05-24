<?php
include("components/include/nav.php");
?>
    <h2>Lista Profesores</h2>
    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>
                <th>Imágen Perfil</th>
                <th>Apellido</th>
                <th>Nombre</th>

                <?php

                if (isset($_SESSION["usu_id"])) {

                ?>

                <th>Email</th>
                <th>Teléfono de Contacto</th>

                <?php

                }

                ?>
            </tr>
        </thead>
        <tbody id="empresa-table">
        </tbody>
        <tfoot id="empresa-table-foot">
        </tfoot>
    </table>
    <script>
        // Realizar una solicitud GET al archivo PHP con el valor como parámetro
        fetch(`./components/api/verUsuarios.proc.php?usu_type=prof`)
        .then(response => response.json())
        .then(data => {
            // Actualizar la tabla con las empresas obtenidas
            const empresaTable = document.getElementById('empresa-table');
            empresaTable.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            data.forEach(profesor => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img src='components/pfpImg/${profesor.usu_img}'></td>
                    <td>${profesor.usu_apellido}</td>
                    <td>${profesor.usu_nom}</td>

                    <?php

                    if (isset($_SESSION["usu_id"])) {

                    ?>

                        <td>${profesor.usu_mail}</td>
                        <td>${profesor.usu_telf}</td>
                    
                    <?php

                    }

                    ?>
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