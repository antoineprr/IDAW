<header>
    <div class="name">
        <h1>Antoine Poirier</h1>

    </div>
    <div class="pfpcontainer">
        <?php
            renderPageToLang($currentPageId);
        ?> 
    </div>
    <div class="spacer"></div>  
</header> 

<?php
    function renderPageToLang($currentPageId) {
        echo '<a href="index.php?page='.$currentPageId.'&lang=fr"> <img src="image/france.svg" alt="flag france" height="30"></a>';
    }
?> 