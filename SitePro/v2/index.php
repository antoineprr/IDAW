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
                renderMenuToHTML('index');
            ?>
            <div class="content">
                <h2>À propos :</h2>
                <section>
                    <p>Ce site professionnel regroupe mon CV ainsi que mes différents projet.</p>
                </section>       
            </div>    
            <?php
                require_once('template_footer.php');
            ?>