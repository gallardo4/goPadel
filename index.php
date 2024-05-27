<?php
include("components/include/nav.php")
?>

    <section class="sectionPresentacion">
        <h1>Todas las facilidades de gestión de un club de padel <br> en un solo sitio</h1>
        <p>Gestión de usuarios, torneos, reservas, administradores, torneos, cobros...<br> ¡Todas estas funciones y muchas más!</p>
    </section>
<?php 
        if(isset($_SESSION['usu_type']) && $_SESSION['usu_type']=='admin'){
            ?>
            <h1>Gestión de Web</h1>
    <section id="gestionGlobal">

        

        
            <div id="gestionBotones">

                <button id="gestionUsers">Gestión Usuarios</button>

                <button id="gestionTorneo">Torneo</button>

                <button id="gestionPartidos">Partidos</button>

                <button id="gestionReservas">Reservas</button>

                <button id="gestionProfesores">Profesores</button>

                <button id="gestionClases">Clases</button>

            </div>

            <script>
                let btnUser =document.getElementById("gestionUsers");
                let btnTorneo =document.getElementById("gestionTorneo");
                let btnPartido =document.getElementById("gestionPartidos");
                let btnReservas =document.getElementById("gestionReservas");
                let btnProfesores =document.getElementById("gestionProfesores");
                let btnClases =document.getElementById("gestionClases");

                btnUser.addEventListener("click",()=>window.location.href="usuarios.php");
                btnTorneo.addEventListener("click",()=>window.location.href="gestionTorneo.php");
                btnPartido.addEventListener("click",()=>window.location.href="gestionPartidos.php");
                btnReservas.addEventListener("click",()=>window.location.href="gestionReservas.php");
                btnProfesores.addEventListener("click",()=>window.location.href="profesores.php");
                btnClases.addEventListener("click",()=>window.location.href="gestionClases.php");
            </script>
        
    </section>
<?php
        }    ?>
        <section class="section1">
            <h1>Sobre nosotros</h1>
            <p>Somos una página web que gestiona una empresa local de pádel.</p>
            <p>Nuestra gestión lleva activa desde mayo de 2024. Todo empezó como un trabajo de final de curso de 1º de DAWe. Los creadores de esta página web somos Alex Martin, Arnau Gallardo y Hugo Alonso. Esta página es una prueba de como podría estar estrucutrada la página final de un negocio de padel en el que se prestan diversos servicios, desde rankings de torneos, o de profesores ().</p>
        </section>
    
        <section class="section1" >
            <h1>Como funcionamos?</h1>
            <p>Hay dos modos de utilizar nuestra página web:</p>
            <p><b>Sin estar registrado:</b> sin estar registrado solo podrás ver esta página, la página inicial, el ranking de usuarios y los profesores disponibles, sin poder reservar alguna clase o inscribirse a algun torneo activo. <br> Es un tanto limitado porque lo que buscamos es que más gente se una a este fenómeno que es el pádel. </p>
            <p><b>Estando registrado:</b> de otro modo, hay dos formas de estar registrado. Siendo un usuario normal y corriente podrás hacer diversas cosas. Lo primero, tendrás acceso a los mismos sitios que un usuario no registrado y, además, podrás hacer reservas de clases, pistas y participar en torneos. <br> La otra forma que tienes de estar registrado es como un admin. De esta manera, tendrás todos los privilegios anteriores y podrás gestionar los torneos y usuarios YA CREADOS, pudiendo modificarlos y eliminarlos si fuera necesario.</p>
            <p>Visto de esta manera puede ser una pagina web a simple vista sencilla, ¡mas no se puede ver es todo el trabajo que lleva detras!</p>
        </section>
        <section class="section1" >
            <h1>¿Qué ofrecemos?</h1>
            <p>Hay dos modos de utilizar nuestra página web:</p>
            <p>Disponemos de diversos servicios, hay la opcion de participacion en torneos de padel que los organiza un admin, ademas se pueden reservar clases de especialización con profesores por si te quieres preparar para jugar algun torneo, o mejorar tu técnica, que estos al final de ella te dejan
               un comentario de como ha ido asi podras ver tu progresión , relacionado con esto tenemos ranking de los 10 mejores jugadores, en tanto a los puntos de los torneos realizados, a la vez que tabla de los profesores que
               hayan impartido mas clases, es decir los mas populares, ovbiamente se pueden realizar reservar de pistas por si quieres disfrutar de un dia maravilloso de padel con tus amigos</p>
        </section>
        <section class="section1">
            <h1>¿Porque nosotros?</h1>
            <p>Porque elegirnos a nosotros, somos una gran empresa de gestion de padel, con la que podras hacer crecer grandiosamente tus ganancias, gracias a nuestros servicios,
               junto a la gran colaboración y compasión utilizada dia a dia en nuestro trabajo en combinación de experiencia, tecnología avanzada y enfoque centrado en el cliente 
               nos convierte en la opción ideal para llevar tu negocio de pádel al siguiente nivel. 
               Nuestra experiencia y dedicación en el sector nos permiten proporcionar soluciones innovadoras y eficaces que se adaptan a las necesidades específicas de cada cliente
               por lo tanto a que esperas, haz escalar tu negocio exponencialmente antes de que sea tarde !
            </p>
        </section>
        <section class="section1">
        <h1>Testimonios</h1>
        <div class="testimonial">
            <p>
                <b>Pol:</b> <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                <br>
                Son muy buenos los trabajadores, estupendo trato hacia los clientes. Un día jugué un torneo en el que me inscribió mi profesor, una auténtica pasada, lo pasamos en grande además de hacer nuevos amigos con los que podré pasar rato jugando a pádel.
                <br>
                <img src="components/src/contentoOjos.png" alt="contento" style="width:70px; height: 70px;">
            </p>
        </div>
        <div class="testimonial">
            <p>
                <b>Carlos:</b> <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                <br>
                Las instalaciones son de primera calidad y siempre están bien mantenidas. He mejorado mucho mi juego gracias a las clases con los profesores, quienes son muy profesionales y atentos.
                Podrian poner packs de clases para precio mas economico
                <br>
                <img src="components/src/contentisimo.png" alt="muycontento"  style="width:70px; height: 70px;">
            </p>
        </div>
        <div class="testimonial">
            <p>
                <b>Marta:</b> <span class="stars">&#9733;&#9733;&#9733;&#9734;&#9734;</span>
                <br>
                Me encanta el ambiente en Pádel Club. Los torneos son muy bien organizados y competitivos, pero siempre hay un espíritu de camaradería. ¡Es el mejor lugar para jugar al pádel!
                Aunque no hay torneos siempre cosa que si eres activo puede condicionarte, cabe resaltar que sus precios son elevados
                <br>
                <img src="components/src/contentoNO.png" alt="nocontento"  style="width:70px; height: 70px;">
            </p>
        </div>
        <div class="testimonial">
            <p>
                <b>Germán:</b> <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                <br>
                Reservar pistas es muy fácil y siempre hay disponibilidad. Mis amigos y yo solemos venir los fines de semana para pasar un buen rato. Además, el ranking de jugadores es una excelente manera de ver nuestro progreso.
                <br>
                <img src="components/src/contento.png" alt="contento"  style="width:70px; height: 70px;">
            </p>
        </div>
        <div class="testimonial">
            <p>
                <b>Diana:</b> <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                <br>
                La primera vez que tomé una clase aquí, supe que era el lugar adecuado para mejorar mi juego. Los profesores son increíbles y te motivan a dar lo mejor de ti. ¡Recomendado al 100%!
                <br>
                <img src="components/src/contentoOjos.png" alt="contento"  style="width:70px; height: 70px;">
            </p>
        </div>
        <div class="testimonial">
            <p>
                <b>Alex:</b> <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                <br>
                El ranking de profesores es muy útil para elegir con quién tomar clases. Todos son muy buenos, pero poder ver quiénes son los más populares me ha ayudado a tomar decisiones informadas. ¡Excelente idea!
                <br>
                <img src="components/src/contento.png" alt="contento"  style="width:70px; height: 70px;">
            </p>
        </div>
    </section>
    

<?php
include("components/include/footer.html")
?>