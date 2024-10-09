<?php
function renderMenuToHTML($currentPageId, $currentLang) {
    $mymenu = array(
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'CV' ),
        'projets' => array('Mes projets'),
        'contact' => array('Mes contacts')
    );

    echo '<nav class="menu">';
    echo '<h2>Menu</h2>';
    echo '<ul>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
        if ($pageId == $currentPageId) {
            echo '<a id="currentpage" href="index.php?page=' . $pageId . '&lang=' . $currentLang . '">' . $pageParameters[0] . '</a>';
        }
        else {
            echo '<a href="index.php?page=' . $pageId . '&lang=' . $currentLang . '">' . $pageParameters[0] . '</a>';
        }
        echo '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}
?>
