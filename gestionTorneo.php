<?php
include("components/include/nav.php")
?>

<section class="formularios">
    <h2>Configurar Usuario</h2>
    
    <div>
        <form id="crearTorneo" method="POST" class="formularioVerde2" action="./components/api/crearTorneo.proc.php">
        
            <label for="torneo_nom">Nombre del Torneo:</label><br>
            <input type="text" name="torneo_nom" id="torneo_nom"><br><br>

            <label for="torneo_nivel">Nivel del Torneo:</label><br>
            <select name="torneo_nivel" required>
                            <option value="c">c</option>
                            <option value="c+">c+</option>
                            <option value="b">b</option>
                            <option value="b+">b+</option>
                            <option value="a">a</option>
                            <option value="P">Profesional</option>
                        </select><br><br>

            <button class="anyadirComentario" type="submit">Crear</button>
        </form>
    </div>
</section>

<?php
include("components/include/footer.html")
?>