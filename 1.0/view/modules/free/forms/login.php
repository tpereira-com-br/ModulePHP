<?php
class LoginForm {
    private $title;

    function __construct() {
        $this->title = "Área Administrativa";
    }
    
    function html(){
        $html = '
        <div id="login" class="conteudo">
        ';
        
        $html .= '
            <h1>'.$this->title.'</h1><br>
            <div class="texto_imgesquerda">
                <div class="img_bloco">
                    <img src="https://cdn.pixabay.com/photo/2017/11/02/10/23/security-2910624_960_720.jpg" alt="contato">
                    <small>Imagem de <a href="https://pixabay.com/pt/users/geralt-9301/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2910624">Gerd Altmann</a> por <a href="https://pixabay.com/pt/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2910624">Pixabay</a></small>
                </div>
                <form class="texto_bloco">
                    <h2>Efetue o login:</h2><br>
                    <input placeholder="Nome de usuário" name="loginuser" id="loginuser" class="form" type="text" autocomplete="username">
                    <input placeholder="Senha" name="loginpw" id="loginpw" class="form" type="password" autocomplete="current-password">
                    <button type="button" name="loginbutton" id="loginbutton class="g-recaptcha" data-sitekey="6LeIrr4ZAAAAAALViLa-1EG42TMPIwpMkMsZngRr" data-callback="login"> ENTRAR</button><br>
        ';

        $html .= '
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
                    <small>Está perdido? Volte para a <a href="/">página principal</a>.</small><br>
                    <small>This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </small>
                </form>
            </div>
        </div>
        ';

        return $html;
    }
}
?>