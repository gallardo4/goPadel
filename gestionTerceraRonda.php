<?php
include("components/include/nav.php")
?>


    <section class="section1">
        <table class="tablaProfYRank" id="final">
            <th>Equipo 1</th>
            <th>Equipo 2</th>
            <th colspan="2"></th>
        </table>

        <a href="components/procs/eliminarPerdedoresSegundaRonda.proc.php?torneo_id=<?php echo $_SESSION['torneo_id'] ?>">VER EQUIPO GANADOR</a>


        <script>
            
            fetch(`./components/api/verTorneos.proc.php?torneo_id=<?php echo $_SESSION['torneo_id'] ?>`)
                .then(response => response.json())
                .then(data => {
                    //console.log(data)
                    equiposFinal = [[data[0],data[1]]];
                    //console.log(equiposSegundaRonda)
                    crearTabla(equiposFinal);
                })

            let equiposFinal = [];

            let idGanadoresFinal = []

            function equipoGanador(equipo,btnGanador,btnPerdedor){
                idGanadoresFinal+=`${equipo} `;
                console.log(idGanadoresFinal)
                btnGanador.remove()
                btnPerdedor.remove()
                document.cookie = `ganadores=${idGanadoresFinal}`
            }
        

            function crearTabla(segundaRonda){
                segundaRonda.forEach(e => {
                    
                
                    console.log(e)

                    let tabla = document.getElementById(`final`);

                    let tr = document.createElement('tr');

                    let id1 = `btnE${e[0].equipo_id}`
                    let id2 = `btnE${e[1].equipo_id}`

                    tr.innerHTML=` 
                    <td> ${e[0].equipo_nombre} </td> 
                    <td> ${e[1].equipo_nombre} </td> 
                    <td> <button id=${id1} onclick=equipoGanador(${e[0].equipo_id},${id1},${id2})> GANA EQUIPO 1 </button> <button id=${id2} onclick=equipoGanador(${e[1].equipo_id},${id2},${id1})> GANA EQUIPO 2 </button> </td> 
                    `

                    tabla.appendChild(tr)

                    partidoNum++;
                })};
</script>

<?php
include("components/include/footer.html")
?>