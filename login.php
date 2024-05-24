<?php
include("components/include/nav.php")
?>

    <section class="formularios">
        <h2>Iniciar Sesión</h2>

        <form action="./components/api/loginUser.proc.php" method="GET" class="formularioVerde">
            <table>
                <tr>
                    <td><input class="añadirComentarioTexto" type="email" name="usu_mail" size="20" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input class="añadirComentarioTexto" type="password" name="usu_contra" size="20" placeholder="Contraseña"><br><br></td>
                </tr>
                <tr>
                    <td><input class="añadirComentario" type="submit" value="Iniciar Sesión"></td>
                </tr>
                <tr>
                    <td><p>¿No estás registrado? ¡Regístrate ya <a class="iniciaSesion" href="register.php">aquí</a>!</p></td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_REQUEST['msg'])){
                echo "<h3>".$_REQUEST['msg']."</h3>";
            }
        ?>
    </section>

<?php
include("components/include/footer.html")
?>