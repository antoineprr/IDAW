<!doctype html>
<?php
    require_once('template_header.php');
?>
            <header>
                <div class="name">
                    <h1>Antoine Poirier</h1>
                </div>
                <div class="pfpcontainer">
                    <figure id="pfp">
                        <img src="image/pfp.jpg" alt="Profile picture" height="50">
                    </figure>
                </div>
                <div class="spacer"></div>  
            </header> 
            <?php
                require_once('template_menu.php');
                renderMenuToHTML('projets');
            ?>
            <div class="content">
                <h2>Mes projets :</h2>
                <section class="projectsection">
                    <h3>Réalisation d'un site professionnel</h3>
                    <p>
                        Premier exercice de l'UV IDAW.
                        <br>
                        Site à améliorer au fur et à mesure de l'UV. La première version étant uniquement réalisée en HTML.
                    </p>
                    <figure id="CodeHTML">
                        <img src="image/screen_code.png" alt="Code HTML Accueil" height="300">
                        <figcaption>Code HTML de la page d'accueil</figcaption>
                    </figure>
                </section>
                <section class="projectsection">
                    <h3>Micro-projet Pharo</h3>
                    <p>
                        Micro-projet de l'UV MLOD.
                        <br>
                        Réalisation d'un jeu de casse-briques en Pharo.
                    </p>
                    <figure id="CodeHTML">
                        <img src="image/screen_game.png" alt="casse-briques" height="300">
                        <figcaption>Capture d'écran du jeu</figcaption>
                    </figure>
                </section> 
            </div>       
            <?php
                require_once('template_footer.php');
            ?>