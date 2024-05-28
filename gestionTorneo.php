<?php
include("components/include/nav.php")
?>

<section class="formularios">
    <h2>Configurar Usuario</h2>
    
    <div>
        <form id="crearTorneo" method="POST" class="formularioVerde2" action="./components/api/crearTorneo.proc.php">
        
            <label for="torneo_nom">Nombre del Torneo:</label><br>
            <input class="anyadirComentarioTexto" type="text" name="torneo_nom" id="torneo_nom"><br><br>

            <label for="torneo_nivel">Nivel del Torneo:</label><br>
            <select class="anyadirComentario" name="torneo_nivel" required>
                            <option value="c">c</option>
                            <option value="c+">c+</option>
                            <option value="b">b</option>
                            <option value="b+">b+</option>
                            <option value="a">a</option>
                            <option value="P">professional</option>
                        </select><br><br>

            <button class="anyadirComentario" type="submit">Crear</button>
        </form>
    </div>
</section>

<table class='tablaProfYRank' border=1>
        <thead>
            <tr>
                <th>ID Torneo</th>
                <th>Nombre</th>
                <th>Nivel de Torneo</th>
                <th>Gestión</th>
            </tr>
        </thead>
        <tbody id="torneo-table">
        </tbody>
        <tfoot id="torneo-table-foot">
        </tfoot>
    </table>

<script>
    fetch(`./components/api/verTorneos.proc.php`)
        .then(response => response.json())
        .then(data => {
            const torneoTable = document.getElementById('torneo-table');

            console.log(data);

            data.forEach(torneo => {
                console.log(torneo);

                const row = document.createElement('tr');

                console.log(torneo.torneo_id);
                console.log(torneo.torneo_nom);
                console.log(torneo.torneo_nivel);

                row.innerHTML = `
                    <td> ${torneo.torneo_id} </td>
                    <td> ${torneo.torneo_nom} </td>
                    <td> ${torneo.torneo_nivel} </td>
                    <td> <a href="gestionPartidos.php?torneo_id=${torneo.torneo_id}">GESTIONAR TORNEO</a> </td>
                `;

                torneoTable.appendChild(row);
                
            });
        })
</script>

<?php
include("components/include/footer.html")
?>