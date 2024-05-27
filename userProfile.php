<?php
include("components/include/nav.php");
?>

<h1>Perfil de usuario de <?php echo $_SESSION['nomCompleto']; ?></h1>

<div id="infoUser">
    <h3>Información Personal:</h3>
</div>

<br>

<a class="añadirComentario" href="configurarUsuario.php">Configurar Usuario</a>
    
<br><br><br>
<div id="infoClases">
    <h3>Clases a las que estas apuntado:</h3>
    <table class='tablaProfYRank'>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Hora de la clase</th>
                <th>Fecha</th>
                <th>Pista</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody id="tablaClases">
        </tbody>
        <tfoot id="tablaClases-foot">
        </tfoot>
    </table>
</div>

<br>

<div id="infoPistas">
    <h3>Reservas de pista que has hecho: </h3>
    <table class='tablaProfYRank'>
        <thead>
            <tr>
                <th>Pista</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody id="tablaPistas">
        </tbody>
        <tfoot id="tablaPistas-foot">
        </tfoot>
    </table>
</div>

<br>


<div id="infoEquipo">
    <h3>Equipos en los que participa:</h3>
    <table class='tablaProfYRank'>
        <thead>
            <tr>
                <th>Nombre Equipo</th>
                <th colspan="2">Miembros del equipo</th>
            </tr>
        </thead>
        <tbody id="tablaEquipo">
        </tbody>
        <tfoot id="tablaEquipo-foot">
        </tfoot>
    </table>
</div>

<br>

<div id="infoComentarios">
    <h3>Comentarios de profesores:</h3>
    <table class='tablaProfYRank'>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody id="tablaComentarios">
        </tbody>
        <tfoot id="tablaComentarios-foot">
        </tfoot>
    </table>
</div>



<script>
    fetch(`./components/api/verUsuarios.proc.php?usu_id=<?php echo $_SESSION['usu_id']; ?>`)
        .then(response=>response.json())
        .then(data => {

            
            let divInfo = document.getElementById("infoUser");

            let pNombre = document.createElement('p');
            let pApellido = document.createElement('p');
            let pGenero = document.createElement('p');
            let pNivel = document.createElement('p');
            let pPuntuacion = document.createElement('p');
            let pTelf = document.createElement('p');
            let pMail = document.createElement('p');

            pNombre.innerHTML = `<b>Nombre</b>: ${data[0]['usu_nom']}`;
            divInfo.appendChild(pNombre)

            pApellido.innerHTML = `<b>Apellido</b>: ${data[0]['usu_apellido']}`;
            divInfo.appendChild(pApellido)

            pGenero.innerHTML = `<b>Género</b>: ${data[0]['usu_genero']}`;
            divInfo.appendChild(pGenero)
            
            pNivel.innerHTML = `<b>Nivel</b>: ${data[0]['usu_nivel']}`;
            divInfo.appendChild(pNivel)


            if(data[0]['usu_puntuacion']==undefined){
                pPuntuacion.innerHTML = `<b>Puntuación</b>: 0`;
            }else{
                pPuntuacion.innerHTML = `<b>Puntuación</b>: ${data[0]['usu_puntuacion']}`;
            }
            
            divInfo.appendChild(pPuntuacion)

            pTelf.innerHTML = `<b>Teléfono</b>: ${data[0]['usu_telf']}`;
            divInfo.appendChild(pTelf)

            pMail.innerHTML = `<b>Email de contacto</b>: ${data[0]['usu_mail']}`;
            divInfo.appendChild(pMail)

            
        })


        fetch(`./components/api/verEquipos.proc.php?usu_id_1=<?php echo $_SESSION['usu_id']; ?>`)
            .then(response=>response.json())
            .then(eqData => {

                if(eqData.length!=0){
                    const tablaEquipo = document.getElementById('tablaEquipo');
                    tablaEquipo.innerHTML = ''; 
                    eqData.forEach(equipo => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${equipo.equipo_nombre}</td>
                            <td> ${equipo.nombre_jugador_1} ${equipo.apellido_jugador_1}</td>
                            <td> ${equipo.nombre_jugador_2} ${equipo.apellido_jugador_2}</td>
                        `;
                        tablaEquipo.appendChild(row);
                    })
                }else{
                    const tablaEquipo = document.getElementById('tablaEquipo');
                    tablaEquipo.innerHTML = '';
                    const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="3">No participas en ningun equipo</td>
                        `;
                        tablaEquipo.appendChild(row);
                }

                
        })

        fetch(`./components/api/verComentarios.proc.php?alumnID=<?php echo $_SESSION['usu_id']; ?>`)
            .then(response=>response.json())
            .then(comData => {

                if(comData.length!=0){
                    const tablaComentarios = document.getElementById('tablaComentarios');
                    tablaComentarios.innerHTML = ''; 
                    comData.forEach(comentario => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${comentario.nombre_profesor} ${comentario.apellido_profesor} </td>
                            <td> ${comentario.texto_comentario}</td>
                    `;
                    tablaComentarios.appendChild(row);
                })
                }else{
                    const tablaComentarios = document.getElementById('tablaComentarios');
                    tablaComentarios.innerHTML = '';
                    const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="3">No tienes ningun comentario</td>
                        `;
                        tablaComentarios.appendChild(row);
                }
                
        })

        fetch(`./components/api/verReservaPropia.proc.php?type=clase`)
            .then(response=>response.json())
            .then(claseReservas => {
                console.log(claseReservas)
                if(claseReservas.length!=0){
                    const infoClases = document.getElementById('tablaClases');
                    infoClases.innerHTML = ''; 
                    claseReservas.forEach(clase => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td> ${clase.nombre_profesor} ${clase.apellido_profesor} </td>
                            <td> ${clase.hora} - ${parseInt(clase.hora)+2} </td>
                            <td> ${clase.fecha_dia} </td>
                            <td> Num. ${clase.pista_id} </td>
                            <td> ${clase.precio_clase}€ </td>
                    `;
                    infoClases.appendChild(row);
                })
                }else{
                    const tablaComentarios = document.getElementById('tablaClases');
                    tablaComentarios.innerHTML = '';
                    const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="6">No tienes ninguna clase apuntada</td>
                        `;
                        tablaComentarios.appendChild(row);
                }
                
        })

        fetch(`./components/api/verReservaPropia.proc.php?type=pista`)
            .then(response=>response.json())
            
            .then(pistaReservas => {

                console.log(pistaReservas)

                if(pistaReservas.length!=0){
                    const tablaPistas = document.getElementById('tablaPistas');
                    tablaPistas.innerHTML = ''; 
                    pistaReservas.forEach(pista => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td> Num. ${pista.pista_id} </td>
                            <td> ${pista.hora} - ${parseInt(pista.hora)+2} </td>
                            <td> ${pista.fecha_dia} </td>
                            <td> ${pista.precio_pista}€ </td>
                    `;
                    tablaPistas.appendChild(row);
                })
                }else{
                    const tablaComentarios = document.getElementById('tablaPistas');
                    tablaComentarios.innerHTML = '';
                    const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="5">No tienes ninguna pista reservada</td>
                        `;
                        tablaComentarios.appendChild(row);
                }
                
        })
        
</script>
<?php
include("components/include/footer.html");
?>