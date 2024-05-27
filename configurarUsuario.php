<?php
include("./components/include/nav.php");

if (!isset($_SESSION['usu_id'])) {
    header('Location: login.php');
    exit;
}
?>

<section class="formularios">
    <h2>Configurar Usuario</h2>
    
    <div>
        <form id="formUpdateUser" class="formularioVerde2">
            <label for="nombre">Nombre:</label>
            <input class="añadirComentarioTexto" type="text" id="nombre" name="usu_nom" required><br>

            <label for="apellido">Apellido:</label>
            <input class="añadirComentarioTexto" type="text" id="apellido" name="usu_apellido" required><br>

            <label for="genero">Género:</label>
            <select class="añadirComentario" id="genero" name="usu_genero" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otro</option>
            </select><br>

            <label for="nivel">Nivel:</label>
            <select class="añadirComentario" id="nivel" name="usu_nivel" required>
                <option value="c">c</option>
                <option value="c+">c+</option>
                <option value="b">b</option>
                <option value="b+">b+</option>
                <option value="a">a</option>
                <option value="professional">professional</option>
            </select><br>

            <label for="puntuacion">Puntuación:</label>
            <input class="añadirComentarioTexto" type="number" id="puntuacion" name="usu_puntuacion" required><br>

            <label for="telefono">Teléfono:</label>
            <input class="añadirComentarioTexto" type="text" id="telefono" name="usu_telf" required><br>

            <label for="email">Email de contacto:</label>
            <input class="añadirComentarioTexto" type="email" id="email" name="usu_mail" readonly><br><br>

            <button class="añadirComentario" type="submit">Actualizar</button>
        </form>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch(`./components/api/verUsuarios.proc.php?usu_id=<?php echo $_SESSION['usu_id']; ?>`)
            .then(response => response.json())
            .then(data => {
                let usuario = data[0];
                
                document.getElementById('nombre').value = usuario['usu_nom'];
                document.getElementById('apellido').value = usuario['usu_apellido'];
                document.getElementById('genero').value = usuario['usu_genero'];
                document.getElementById('nivel').value = usuario['usu_nivel'];
                document.getElementById('puntuacion').value = usuario['usu_puntuacion'] || 0;
                document.getElementById('telefono').value = usuario['usu_telf'];
                document.getElementById('email').value = usuario['usu_mail'];
            })
            .catch(error => {
                console.error("ERROR: ", error);
            });
        
        document.getElementById('formUpdateUser').addEventListener('submit', function(event) {
            event.preventDefault();
            
            console.log("Formulario enviado");

            let formData = new FormData(this);
            
            console.log("FormData: ", Object.fromEntries(formData.entries()));

            fetch('./components/api/actualizarUsuario.proc.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log("Respuesta del servidor: ", response);
                return response.json();
            })
            .then(data => {
                console.log("Datos recibidos: ", data);
                if (data.success) {
                    alert('Usuario actualizado correctamente.');
                } else {
                    alert('Error al actualizar usuario: ' + data.message);
                }
            })
            .catch(error => {
                console.error("ERROR: ", error);
                alert('Hubo un problema al actualizar el usuario.');
            });
        });
    });
</script>

<?php
include("./components/include/footer.html");
?>
