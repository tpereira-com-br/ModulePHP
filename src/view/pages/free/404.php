<?php
//Page Settings.
$title = "Home -".site_name;
$description = "Page description";
$url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$keywords = "MVC, AJAX, FRAMEWORK, TPEREIRA";

//Importing the page modules.
//Importing Menu Module
include("view/modules/free/general/menu.php");
$menu = new Menu("demonstration");
$menu = $menu->html();

//Importing Favicon Module
include("view/modules/free/general/favicon.php");
$favicon = new Favicon();
$favicon = $favicon->html();

//Importing Main Page Module
include("view/modules/free/other/main_page.php");
$mainpage = new MainPage();
$mainpage = $mainpage->html();
?>


<!DOCTYPE html>
<html lang="pt_br" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $description ?>">
        <meta name="keywords" content="<?php echo $keywords ?>">
        <meta name="author" content="<?php echo site_author ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="<?php echo site_color1 ?>">
        <meta name="apple-mobile-web-app-status-bar-style" content="<?php echo site_color1 ?>">
        <meta name="msapplication-navbutton-color" content="<?php echo site_color1 ?>">
        <meta name="twitter:image:src" content="<?php echo site_banner ?>">
        <meta name="twitter:site" content="<?php echo site_twitter ?>">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="<?php echo $title ?>">
        <meta name="twitter:description" content="<?php echo $description ?>">
        <meta property="og:image" content="<?php echo site_banner ?>">
        <meta property="og:site_name" content="<?php echo site_name ?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $title ?>">
        <meta property="og:url" content="<?php echo $url ?>">
        <meta property="og:description" content="<?php echo $description ?>">
        <title><?php echo $title ?></title>

        <?php echo $favicon?>

        <script src="/assets/js/menu_top.js" defer></script>
        <script src="/assets/js/scrollto/scrollto.slim.min.js" defer></script>
        <script src="/assets/js/main.js" defer></script>

        <link rel="stylesheet" href="/assets/css/main.css">
        <link rel="stylesheet" href="/assets/css/layout1.css">
        
        <!-- TAG DO GOOGLE RECAPTCHA 3.0
        <script src="https://www.google.com/recaptcha/api.js?render=YOUR_KEY"></script>
        -->
    </head>

    <body>
        <?php echo $menu ?>
        <div class="content">
            Página não existente!
        </div>    
    </body>
</html>