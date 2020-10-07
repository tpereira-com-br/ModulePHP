<?php
//Start the session.
session_start();

//Sets the default Include Path.
set_include_path('../');

//Load system settings.
require_once("config.php");

//Load the route builder.
require_once("controller/browse.php");
?>