<?php
//Page Settings.
$title = "Login - ".site_name;
$description = site_name." - Login";
$url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$keywords = "NIDF, SOMS, OS";

//Importing the page modules.

//Importing Favicon Module
include("view/modules/free/general/favicon.php");
$favicon = new Favicon();
$favicon = $favicon->html();
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

        <?php include("../view/modules/publico/favicon.php"); ?>

        <script src="/assets/js/menu_top.js" defer></script>
        <script src="/assets/js/scrollto/scrollto.slim.min.js" defer></script>
        <script src="/assets/js/main.js" defer></script>

        <link rel="stylesheet" href="/assets/css/main.css">
        <link rel="stylesheet" href="/assets/css/layout1.css">

        <?php echo $favicon?>
        
        <!-- TAG DO GOOGLE RECAPTCHA 3.0
        <script src="https://www.google.com/recaptcha/api.js?render=YOUR_KEY"></script>
        -->
    </head>

    <body>
        <div class="fullscreen" style="background-image: url('<?php echo site_banner ?>')">
            <div class="fullscreenbox">
                <img class="fullscreenboxlogo" src="<?php echo site_logo ?>" alt="Logo <?php echo site_name ?>">
                <form>
                    <h1>Intranet</h1>
                    <label for="user">Usuário</label>
                    <input name="user" placeholder="Usuário" type="text" value="">
                    <label for="pw">Senha</label>
                    <input name="user" placeholder="Senha" type="password" value="">
                    <button type="button" name="loginbutton" id="loginbutton" class="g-recaptcha" data-sitekey="<?php echo grecaptcha-key ?>" data-callback="login"> ENTRAR</button>
                    <script src="/assets/js/login.js" defer></script>
                    <script>
                        function login(token){
                            var user = document.querySelector("#loginuser[name=loginuser]").value,
                            pw = document.querySelector("#loginpw[name=loginpw]").value,
                            login = new Login(user,pw,token);
                            if(login.dataValidate()){
                                login.send();
                            };  
                        }
                    </script>
                    <small>This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </small>
                </form>
            </div>
        </div>
    </body>
</html>