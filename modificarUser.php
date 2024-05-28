<?php
include("./components/include/nav.php");

if (!isset($_SESSION['usu_id'])) {
    header('Location: login.php');
    exit;
}
?>



<section class="formularios">
    <h2>Configurar Usuario</h2>

    <?php
        if(isset($_REQUEST['msg'])){
            echo "<h3>".$_REQUEST['msg']."</h3>";
        }
    ?>
    
    <div>
        <form id="formUpdateUser" method="GET" class="formularioVerde2" action="./components/api/actualizarUsuarioGlobal.proc.php?usu_id=<?php echo $_GET['usu_id'] ?>">
            <label for="id">ID del usuario a modificar: <?php echo $_GET['usu_id'] ?></label>
            <input type="hidden" name="usu_id" value="<?php echo $_GET['usu_id'] ?>">

            <label for="nombre">Nombre:</label>
            <input class="anyadirComentarioTexto" type="text" id="nombre" name="usu_nom" required><br>

            <label for="apellido">Apellido:</label>
            <input class="anyadirComentarioTexto" type="text" id="apellido" name="usu_apellido" required><br>

            <label for="genero">Género:</label>
            <select class="anyadirComentario" id="genero" name="usu_genero" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otro</option>
            </select><br>

            <label for="usu_type">Tipo de usuario: </label>
            <select class="anyadirComentario" name="usu_type" id="usu_type">
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="prof">Profesor</option>
            </select><br>

            <label for="nivel">Nivel:</label>
            <select class="anyadirComentario" id="nivel" name="usu_nivel" required>
                <option value="c">c</option>
                <option value="c+">c+</option>
                <option value="b">b</option>
                <option value="b+">b+</option>
                <option value="a">a</option>
                <option value="professional">professional</option>
            </select><br>

            <label for="puntuacion">Puntuación:</label>
            <input class="anyadirComentarioTexto" type="text" name="usu_puntuacion" id="puntuacion"><br>

            <label for="telefono">Teléfono:</label>
            <input class="anyadirComentarioTexto" type="text" id="telefono" name="usu_telf" required><br>

            <label for="email">Email de contacto:</label>
            <input class="anyadirComentarioTexto" type="email" id="email" name="usu_mail" readonly><br><br>

            <button class="anyadirComentario" type="submit">Actualizar</button>
        </form>
    </div>
</section>

<script>
    let form = document.getElementById('formUpdateUser');

    fetch(`./components/api/verUsuarios.proc.php?usu_id=<?php echo $_GET['usu_id'] ?>`)
        .then(response => response.json())
        .then(data => {

            console.log(data)

            console.log(data[0])

            console.log(data[0].usu_id)

            let usuario = data[0];
            let nombre = usuario.usu_nom;
            console.log(nombre)
            let apellido = usuario.usu_apellido;
            console.log(apellido)
            let genero = usuario.usu_genero;
            console.log(genero)
            let nivel = usuario.usu_nivel;
            console.log(nivel)
            let puntuacion = usuario.usu_puntuacion;
            console.log(puntuacion)
            let telefono = usuario.usu_telf;
            console.log(telefono)
            let email = usuario.usu_mail;
            console.log(email)

            let formNom = document.getElementById('nombre');
            formNom.value = nombre

            let formApellido = document.getElementById('apellido');
            formApellido.value = apellido

            let formGenero = document.getElementById('genero');
            formGenero.value = genero

            let formNivel = document.getElementById('nivel');
            formNivel.value = nivel

            let formPuntuacion = document.getElementById('puntuacion');
            formPuntuacion.value = puntuacion

            let formTelefono = document.getElementById('telefono');
            formTelefono.value = telefono

            let formEmail = document.getElementById('email');
            formEmail.value = email
    });

</script>

<?php
include("./components/include/footer.html");
?>
