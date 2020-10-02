<?php

class Footer {
    private $social;
    private $author;

    function __construct(){
        $this->author = [
            [
                "nome" => "Thiago Costa Pereira",
                "href" => "https://api.whatsapp.com/send?phone=5521900000000&text=Estou%20vindo%20pelo%20site%20do%20Mil%20Rifas.",
            ],
        ];
       
        $this->social = [
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

    function setSocial($social){
        $this->social = $social;
    }
    
    function setAuthor($author){
        $this->author = $author;
    }

    function html(){
        $html = '<footer>';
        if ($this->social) {
            $html .= '<div class="redes_sociais">';
            foreach ($this->social as $social) {
                $html .='
                <a href="'.$social["href"].'">
                    <img src="'.$social["imgsrc"].'" alt="Logo do "'.$social["nome"].'" class="socialbutton">
                </a>
                ';
            }
            $html.="</div>";
        }
       
        $html .=  '
        <div><span class="copyleft">©</span> 2020-'.date('Y').' Design e conteúdo do site licenciado por&nbsp<a href="http://creativecommons.org/licenses/by/4.0/" target="_blank" rel="noopener noreferrer">Creative Commons Atribuição 4.0 Internacional.</a></div>
        <div>Desenvolvido por: <a href="'.$this->author[0]["href"].'" target="_blank" rel="license noopener noreferrer">'.$this->autoria[0]["nome"].'</a></div>  
        ';
        $html.="</footer>";

        return $html;
    }
}
?>