<?php

class Rodape {
    private $redes_sociais;
    private $autoria;

    function __construct(){
        $this->autoria = [
            [
                "nome" => "Thiago Costa Pereira",
                "href" => "https://api.whatsapp.com/send?phone=5521900000000&text=Estou%20vindo%20pelo%20site%20do%20Mil%20Rifas.",
            ],
        ];
       
        $this->redes_sociais = [
            [
                "nome" => "Instagram",
                "href" => "https://www.instagram.com/milrifas.oficial/",
                "imgsrc" => "/assets//img/instagram.png",
            ],
            /*
            [
                "nome" => "Whatsapp",
                "href" => "https://api.whatsapp.com/send?phone=5521900000000&text=Estou%20vindo%20pelo%20site%20do%20Mil%20Rifas.",
                "imgsrc" => "/assets//img/whatsapp.webp",
            ],
            [
                "nome" => "Facebook",
                "href" => "https://fb.me/",
                "imgsrc" => "/assets/img/facebook.webp",
            ],
            [
                "nome" => "Messenger",
                "href" => "https://m.me/",
                "imgsrc" => "/assets/img/messenger.webp",
            ],*/
        ];
    }

    function setRedesSociais($redes_sociais){
        $this->redes_sociais = $redes_sociais;
    }

    function html(){
        $html = '<footer class="rodapé">';
        if ($this->redes_sociais) {
            $html .= '<div class="redes_sociais">';
            foreach ($this->redes_sociais as $rede_social) {
                $html .='
                <a href="'.$rede_social["href"].'">
                    <img src="'.$rede_social["imgsrc"].'" alt="Logo do "'.$rede_social["nome"].'" class="botao_social">
                </a>
                ';
            }
            $html.="</div>";
        }
       
        $html .=  '
        <div><span class="copyleft">©</span> 2020-'.date('Y').' Design e conteúdo do site licenciado por&nbsp<a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" rel="noopener noreferrer">Creative Commons Atribuição 4.0 Internacional.</a></div>
        <div>Desenvolvido por: <a href="'.$this->autoria[0]["href"].'" target="_blank" rel="license noopener noreferrer">'.$this->autoria[0]["nome"].'</a></div>  
        ';
        $html.="</footer>";

        return $html;
    }
}
?>