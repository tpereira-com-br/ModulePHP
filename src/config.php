<?
//Database configurations.
const db_host = false;
const db_user = false;
const db_pw = false;
const db_name = false;

//Website informations.
const site_name = "ModulePHP";
const site_twitter = "@twitter_profile";
const site_color1 = "#600";
const site_color2 = "#FFF";
const site_author = "Thiago Costa Pereira - https://tpereira.com.br";
const site_url = "https://modulephp.tpereira.com.br";
const site_banner = "/assets/img/login.jpg";
const site_banner2 = "/assets/img/background.jpg";
const site_logo = "/assets/img/modulephplogo.png";

//Universal system settings.
header("Content-type: text/html; charset=utf-8");
ini_set( 'zlib.output_compression', 'On' );
error_reporting(0);

//Settings for debugging the system.
//error_reporting(E_ALL & ~E_NOTICE);
//const debug = true;
?>