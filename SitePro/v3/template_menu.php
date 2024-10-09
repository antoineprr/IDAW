<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets'),
        'contact' => array('Mes Contacts')
    );

    echo '<nav class="menu">';
    echo '<h2>Menu</h2>';
    echo '<ul>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if ($pageId == $currentPageId) {
            echo '<a id="currentpage" href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a>';
        }
        else {
            echo '<a href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a>';
        }
        echo '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}
?>
