<?php

class Menu {
    private $links;

    function __construct($layout){
        switch ($layout) {
            case "demonstration":
                $this->links = [
                    [
                        "name" => "HOME",
                        "scrollto" => "",
                        "href" => "/",
                    ],
                    [
                        "name" => "LOGIN",
                        "scrollto" => "",
                        "href" => "/login",
                    ],
                    [
                        "name" => "ADMIN",
                        "scrollto" => "",
                        "href" => "/admin/perfil",
                    ],
                ];
                break;
            
            default:
                $this->links = [
                    [
                        "name" => "Page 1",
                        "scrollto" => "",
                        "href" => "/page1",
                    ],
                    [
                        "name" => "Page 2",
                        "scrollto" => "",
                        "href" => "/page2",
                    ],
                    [
                        "name" => "Page 3",
                        "scrollto" => "",
                        "href" => "/page3",
                    ],
                    [
                        "name" => "Page 4",
                        "scrollto" => "",
                        "href" => "/page4",
                    ],
                ];
                break;
        }
    }

    function html(){
        $html = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
        $html .= '<div class="menu menu_esq">';
        $html .= '<img class="menulogo" src="'.site_logo.'" alt="Logo '.site_name.'">';
        $html .= '<div class="menubutton"><i class="fa fa-bars"></i></div>';
        if ($this->links) {
            $html .= '<div class="containermenulink">';
            foreach ($this->links as $link) {
                if (empty($link["href"])) {
                  $html.='<a scrollto="'.$link["scrollto"].'" class="menulink">'.$link["name"].'</a>';
                } else {
                    $html.='<a href="'.$link["href"].'" class="menulink">'.$link["name"].'</a>';
                }
            }
            $html.="</div>";
        }
        $html.='</div>';
        return $html;
    }
}
?>