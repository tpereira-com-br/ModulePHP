<?php
//Checa se usuário está logado e validade da sessão; 
require_once("model/system/access.php");
$access = new Access();
$access->auth();

//Abre o módulo do sistema de busca e exibição de arquivos.
require_once("model/system/file.php");
$file = new File();

//Habilita a função de página lite (baixo consumo de rede).
$file->lite();

//Abre a página ou arquivo requisitado;
$file->open($access->userlevel);
?>