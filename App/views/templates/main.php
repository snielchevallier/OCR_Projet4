<?php 
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TomTroc - <?=$title?></title>
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        <!--styles-->
        <link href="<?= ASSETS_PATH ?>styles/styles.css" rel="stylesheet">
        
        <!--scripts-->
        <script src="<?= ASSETS_PATH ?>js/scripts.js" defer></script>
    </head>
    <body class="bg-tomTroc-bg">
        <?php require(TEMPLATE_PARTS_PATH . 'header.php');?>

        <main>    
            <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
        </main>
        
        <?php require(TEMPLATE_PARTS_PATH . 'footer.php');?>

    </body>
</html>