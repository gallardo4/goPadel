<?php
include("components/include/nav.php")
?>
<section class="section1">
<table class="tablaProfYRank" id="primeraFase1">
    <th>Equipo 1</th>
    <th>Equipo 2</th>
    <th colspan="2"></th>
</table>
<table class="tablaProfYRank" id="primeraFase2">
    <th>Equipo 3</th>
    <th>Equipo 4</th>
    <th colspan="2"></th>

</table>
<table class="tablaProfYRank" id="primeraFase3">
    <th>Equipo 5</th>
    <th>Equipo 6</th>
    <th colspan="2"></th>

</table>
<table class="tablaProfYRank" id="primeraFase4">
    <th>Equipo 7</th>
    <th>Equipo 8</th>
    <th colspan="2"></th>
</table>

<a href="components/procs/eliminarPerdedores.proc.php?torneo_id=<?php echo $_GET['torneo_id'] ?>">SIGUIENTE RONDA</a>

</section>


<script>
    fetch(`./components/api/verTorneos.proc.php?torneo_id=<?php echo $_GET['torneo_id'] ?>`)
        .then(response => response.json())
        .then(data => {
            equiposPrimeraRonda = [[data[0],data[1]],[data[2],data[3]],[data[4],data[5]],[data[6],data[7]]];
        
            crearTabla(equiposPrimeraRonda);
        })

    let equiposPrimeraRonda = [];
    let idGanadoresPrimeraRonda = [];


    function mezclarArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }   
    }

    
    function crearTabla(segundaRonda){
                let partidoNum =1;
                console.log(segundaRonda)
                segundaRonda.forEach(e => {
                    console.log(e)

                    let tabla = document.getElementById(`primeraFase${partidoNum}`);

                    let tr = document.createElement('tr');

                    let id1 = `btnE${e[0].equipo_id}`
                    let id2 = `btnE${e[1].equipo_id}`

                    tr.innerHTML=` 
                    <td> ${e[0].equipo_nombre} </td> 
                    <td> ${e[1].equipo_nombre} </td> 
                    <td> <button id=${id1} onclick=equipoGanador1(${e[0].equipo_id},${id1},${id2})> GANA EQUIPO 1 </button> <button id=${id2} onclick=equipoGanador1(${e[1].equipo_id},${id2},${id1})> GANA EQUIPO 2 </button> </td> 
                    `

                    tabla.appendChild(tr)

                    partidoNum++;
                })
    }

    function equipoGanador1(equipo,btnGanador,btnPerdedor){
        idGanadoresPrimeraRonda+=`${equipo} `;
        console.log(idGanadoresPrimeraRonda)
        btnGanador.remove()
        btnPerdedor.remove()
        document.cookie = `ganadoresRonda1=${idGanadoresPrimeraRonda}`

    }
    




   
        
</script>

<?php
include("components/include/footer.html")
?>