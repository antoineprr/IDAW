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
        echo '<a href="index.php?page='.$currentPageId.'&lang=en"><img src="image/uk.svg" alt="flag uk" height="30"></a>';
    }
?> 