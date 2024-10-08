<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'index' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets')
    );

    echo '<nav class="menu">';
    echo '<h2>Menu</h2>';
    echo '<ul>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if ($pageId == $currentPageId) {
            echo '<a id="currentpage" href="' . $pageId . '.php">' . $pageParameters[0] . '</a>';
        }
        else {
            echo '<a href="' . $pageId . '.php">' . $pageParameters[0] . '</a>';
        }
        echo '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}
?>
