        <div class="spacer"></div>         
        <footer>
            <div class="credit">© Antoine Poirier</div>
            <?php
                renderPageNameBottom($currentPageId);
            ?> 
        </footer>    
    </body>
</html>

<?php
    function renderPageNameBottom($currentPageId) {
        $mymenu = array(
            'accueil' => array( 'Accueil' ),
            'cv' => array( 'CV' ),
            'projets' => array('Projets'),
            'contact' => array('Contacts')
        );
        echo '<div class="pagename">'.$mymenu[$currentPageId][0].'</div>';
    }
?> 