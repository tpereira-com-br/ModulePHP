<?php

class Sobre {
    private $class;
    private $texto;
    private $img;
    
    function __construct(){
        $this->class = "texto_imgdireita";

        $this->texto = "Somos um grupo de pessoas que buscamos sempre o melhor, ficamos cansados de rifas com prêmios ruins e sem clareza no sorteio. Baseado nessa vontade de fazer algo sempre melhor que surgiu o Mil Rifas, aqui você concorre aos melhores prêmios das rifas e com total clareza sobre o sorteio. Tudo sobre o sorteio fica esclarecido em nosso regulamento.";
       
        $this->img = [
            "href" => "https://cdn.pixabay.com/photo/2017/06/27/11/48/team-spirit-2447163_960_720.jpg",
            "alt" => "banner.",
            
            "autor" => [
                "nome" => "Anemone123",
                "href" => "https://pixabay.com/pt/users/Anemone123-2637160/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2447163",
            ],
            "fonte" => [
                "nome" => "Pixabay",
                "href" => "https://pixabay.com/pt/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2447163",
            ],            
        ];
    }
    
    function html(){
        $html = '<h1>Sobre nós</h1><br>';
        $html .= '<div class="'.$this->class.'">';
        $html .= '<div class="img_bloco">';
        $html .= '<img src="'.$this->img["href"].'" alt="'.$this->img["alt"].'">';
        $html .= '<small>Imagem de <a href="'.$this->img["autor"]["href"].'">'.$this->img["autor"]["nome"].'</a> por <a href="'.$this->img["fonte"]["href"].'">'.$this->img["fonte"]["nome"].'</a></small>';
        $html .= '</div>';
        $html .= '<div class="texto_bloco justificado">';
        $html .= $this->texto;
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
?>