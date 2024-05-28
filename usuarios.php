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
    <?php
        if(isset($_REQUEST['msg'])){
            echo "<h3>".$_REQUEST['msg']."</h3>";
        }
    ?>
    
    <?php

    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type'] != 'user') {
        ?>

        <br>
        <a class='anyadirComentario' href='crearUser.php'>Crear nuevo usuario</a>

        <?php
    }

    ?>

    <br>
    <table class='tablaProfYRank' border=1>
        <thead>
            <tr>
                <th>Imágen Perfil</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <?php

                    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type'] != 'user') {
                        echo "<th>Email</th>";
                        echo "<th>Teléfono de Contacto</th>";
                    }

                    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type'] != 'user') {
                        echo "<th>Comentario</th>";
                    }

                    if($_SESSION['usu_type']=='admin'){
                        echo "<th colspan=2>Gestión</th>";
                    }

                ?>
            </tr>
        </thead>
        <tbody id="user-table">
        </tbody>
        <tfoot id="user-table-foot">
        </tfoot>
    </table>
    <script>
        // Realizar una solicitud GET al archivo PHP con el valor como parámetro
        fetch(`./components/api/verUsuarios.proc.php`)
        .then(response => response.json())
        .then(data => {
            // Actualizar la tabla con las users obtenidas
            const userTable = document.getElementById('user-table');
            userTable.innerHTML = ''; // Limpiar la tabla antes de agregar nuevas filas
            data.forEach(usuario => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img style="width:60px; height:60px; border-radius:15px;" src='components/pfpImg/${usuario.usu_img}'></td>
                    <td>${usuario.usu_apellido}</td>
                    <td>${usuario.usu_nom}</td>

                    <?php

                    if (isset($_SESSION["usu_type"]) && $_SESSION["usu_type"]=='prof') {
                        ?>

                        <td>${usuario.usu_mail}</td>
                        <td>${usuario.usu_telf}</td>
                        <td><a class=anyadirComentario href=ponerComentario.php?usu_id=${usuario.usu_id}>Añadir Comentario</a></td>

                        <?php
                    }

                    if (isset($_SESSION['usu_type']) && $_SESSION['usu_type']=='admin' ) {
                        ?>
                        
                        <td>${usuario.usu_mail}</td>
                        <td>${usuario.usu_telf}</td>
                        <td><a class=anyadirComentario href=./verComentarios.php?usu_id=${usuario.usu_id}>Ver Comentarios</a></td>
                        <td><a class=anyadirComentario href=./components/api/eliminarUser.proc.php?usu_id=${usuario.usu_id}>Eliminar</a></td>
                        <td><a class=anyadirComentario href=./modificarUser.php?usu_id=${usuario.usu_id}>Modificar</a></td>

                        <?php
                    
                    
                    }

                    ?>
                `;
                userTable.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });

    </script>

<?php
}

include("components/include/footer.html");
?>