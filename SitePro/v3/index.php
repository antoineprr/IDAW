<?php
    $currentLang = 'fr';
    if(isset($_GET['lang'])) {
        $currentLang = $_GET['lang'];
    }

    require_once($currentLang . "/template_header.php");
    require_once($currentLang . "/template_menu.php");

    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
?>

<?php
    require_once($currentLang . "/template_bandeau_haut.php");
?>

<?php
    renderMenuToHTML($currentPageId, $currentLang);
?>

<section class="corps">
    <?php
        $pageToInclude = $currentLang . '/' . $currentPageId . ".php";
        if(is_readable($pageToInclude))
            require_once($pageToInclude);
        else
            require_once("error.php");
    ?>
</section>

<?php
    require_once($currentLang . "/template_footer.php");
?>