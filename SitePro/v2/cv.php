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
                renderMenuToHTML('cv');
            ?>
            <div class="content">
                <h2>Mon CV</h2>
                <section>
                    <h3>Antoine Poirier</h3>
                    <p>
                        Étudiant à IMT Nord Europe
                        <br>
                        Je suis à la recherche d'un stage dans le domaine du développement web d'une durée de 16 semaines à partir du 7 avril 2025.
                    </p>
                </section> 
            </div>
            <?php
                require_once('template_footer.php');
            ?>