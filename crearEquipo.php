<?php
include("components/include/nav.php")
?>

    <section class="formularios">
        <h2>Crear Equipo</h2>

        <form action="./components/api/afegirEquip.proc.php" method="POST" class="formularioVerde">
            <table>

                <tr>
                    <td>
                    <select class="anyadirComentario" name="usu_company" id="usu_company">
                        <option value="" disabled selected>Compañeros</option>

                    </select>
                    </td>
                </tr>

                <tr>
                    <td><input class="anyadirComentarioTexto" type="text" name="equipo_nombre" size="20" placeholder="Nombre de equipo"></td>
                </tr>

                <tr>
                    <td><br><input class="anyadirComentario" type="submit" value="Registrar equipo"></td>
                </tr>

            </table>
        </form>
    </section>

    <?php

    if(isset($_GET['msg'])){
            echo "<h3>$_GET[msg] </h3>";
    }

    ?>

    <script>

        <?php
            if(isset($_REQUEST["msg"]))
        ?>

        let selectCompany = document.getElementById('usu_company');
        fetch(`./components/api/verUsuarios.proc.php`)
        .then(response=>response.json())
        .then(data => {
            data.forEach(e => {
                if(e['usu_id'] != <?php echo $_SESSION['usu_id'] ?>){
                    let option = document.createElement("option");
                    option.value=e['usu_id']

                    let texto = e['usu_mail']

                    texto = texto.split("@")
                
                    console.log(texto[0])

                    option.textContent=texto[0];
                    selectCompany.appendChild(option)
                }
                
            });
        })
        .catch(error=>{
            console.error("ERROR: ",error);
        })

    </script>

<?php
include("components/include/footer.html")
?>