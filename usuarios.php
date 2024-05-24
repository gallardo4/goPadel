<?php
include("components/include/nav.php");

if (!isset($_SESSION["usu_id"])) {

?>

    <h2>¡<a class="iniciaSesion" href="login.php">Inicia sesión</a> para ver la lista de usuarios!</h2>

<?php

} else {

?>
    <h2>Lista Usuarios</h2>
    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>
                <th>Imágen Perfil</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono de Contacto</th>
                <?php

                    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type']!='user') {
                        echo "<th>Comentario</th>";
                        if($_SESSION['usu_type']=='admin'){
                            echo "<th colspan=2>Gestión</th>";
                        }
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
        fetch(`./components/api/verUsuarios.proc.php`)
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
                    <td>${usuario.usu_mail}</td>
                    <td>${usuario.usu_telf}</td>
                    <?php

                    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type']=='admin' ) {
                        ?>
                        
                        <td><a class=añadirComentario href=ponerComentario.php?usu_id=${usuario.usu_id}>Añadir Comentario</a></td>
                        <td><a class=añadirComentario href=./components/api/eliminarUser.proc.php?usu_id=${usuario.usu_id}>Eliminar</a></td>
                        <td><a class=añadirComentario href=./components/api/modificarUser.proc.php?usu_id=${usuario.usu_id}>Modificar</a></td>

                        <?php
                    
                    
                    }elseif (isset($_SESSION['usu_type']) && $_SESSION['usu_type']!='user') {
                        ?>
                        
                        <td><a class=añadirComentario href=ponerComentario.php?usu_id=${usuario.usu_id}>Añadir Comentario</a></td>
                    
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
}

include("components/include/footer.html");
?>