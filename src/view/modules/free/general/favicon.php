<?php
class Favicon {

    function html(){
        $html = '
        <link rel="icon" href="'.site_logo.'" type="image/png">
        <link rel="icon" href="'.site_logo.'" sizes="32x32">
        <link rel="icon" href="'.site_logo.'" sizes="192x192">
        <link rel="apple-touch-icon-precomposed" href="'.site_logo.'">
        <meta name="msapplication-TileImage" content="'.site_logo.'">
        ';
        return $html;
    }
}
?>