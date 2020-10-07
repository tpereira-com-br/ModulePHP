/*Node.prototype.scrollto = function(tipo="click", trigger="[scrollto]", target=false, margintop = ".menufixedtop", duration=2000, testes = "html") {
    this.addEventListener(tipo, function(e) {
        var e = e.target;
        do {
            if (e.matches(trigger)) {
                var move;
                if (!target) {
                    target=e.getAttribute("scrollto");
                }

                //Finaliza scrolls anteriores caso existam.
                console.log(this.scroll);
                clearInterval(this.scroll);
            
                //Seleciona o container que contém o scroll.
                //Padrão: "html";
                var container = document.querySelector(testes)
                
                //Verifica se existe menu fixo no topo, o menu deve estar com a class "menufixedtop";
                if (isNaN(margintop)) {
                    margintop = document.querySelector(margintop).getBoundingClientRect().height; 
                }
            
                //Busca o elemento alvo;
                var target = document.querySelector(target);
                
                //Intervalo com que o movimento vai ocorrer em ms.
                //Mais lento = Mais fluido e mais consumo de recursos. 
             //Padrão: 10;
                var moveinterval  = 10;
            
                //Calcula o número de vezes que o setInterval irá execultar;
                var movenumber = duration/moveinterval;
            
                //Distância do elemento até o topo da tela;
                var initialdistance = target.offsetTop - container.scrollTop - margintop;
            
                //Calcula a velocidade inicial.
                var velocity = (initialdistance)/(movenumber);
            
                //Define uma velocidade mínima e máxima. Padrão: 5, infinito;
                var minimumvelocity = 5, maximumvelocity = Infinity;
                if (Math.abs(velocity)<minimumvelocity) {
                    velocity=minimumvelocity * velocity/Math.abs(velocity);
                } else if (Math.abs(velocity)>maximumvelocity) {
                    initialvelocity=maximumvelocity * velocity/Math.abs(velocity);
                }
            
                //Inicia o movimento a cada "moveinterval"ms.
                this.scroll = setInterval(function(){
                    //Calcula a distância atual;
                    var currentdistance = target.offsetTop - container.scrollTop - margintop;
            
                    //Verifica se chegou no destino
                    if(initialdistance*currentdistance<=0){
                        //Se chegou no destino, então finaliza o setInterval() e se ajusta ao elemento alvo; 
                        clearInterval(this.scroll);
                        container.scrollTop = target.offsetTop - margintop;
                    } else {
                        //Se não chegou no destino, então faz o movimento;
                        container.scrollTop += velocity;
                    }
                },moveinterval);
                break;
            }
        } while ((e = e.parentNode) != this);
    });
}

document.scrollto("click", "[scrollto]");
*/
(function(){
    var move;
    this.addEventListener("click", function(e) {
        var e = e.target;
        var trigger = "[scrollto]";
        do {
            if (e.matches(trigger)) {
                scrollto(e.getAttribute("scrollto"), ".menufixedtop");
                function scrollto(target="html", margintop = "head", duration=2000, container = "html") {
                    //Finaliza scrolls anteriores caso existam.
                    clearInterval(move);
                
                    //Seleciona o container que contém o scroll.
                    //Padrão: "html";
                    var container = document.querySelector(container);
                    
                    //Verifica se existe menu fixo no topo, o menu deve estar com a class "menufixedtop";
                    if(document.querySelector(margintop)){
                        margintop = document.querySelector(margintop).getBoundingClientRect().height; 
                    }
                
                    //Busca o elemento alvo;
                    var target = document.querySelector(target);
                    
                    //Intervalo com que o movimento vai ocorrer em ms.
                    //Mais lento = Mais fluido e mais consumo de recursos. 
                    //Padrão: 10;
                    var moveinterval  = 10;
                
                    //Calcula o número de vezes que o setInterval irá execultar;
                    var movenumber = duration/moveinterval;
                
                    //Distância do elemento até o topo da tela;
                    var initialdistance = target.offsetTop - container.scrollTop - margintop;
                
                    //Calcula a velocidade inicial.
                    var velocity = (initialdistance)/(movenumber);
                
                    //Define uma velocidade mínima e máxima. Padrão: 5, infinito;
                    var minimumvelocity = 5, maximumvelocity = Infinity;
                    if (Math.abs(velocity)<minimumvelocity) {
                        velocity=minimumvelocity * velocity/Math.abs(velocity);
                    } else if (Math.abs(velocity)>maximumvelocity) {
                        initialvelocity=maximumvelocity * velocity/Math.abs(velocity);
                    }
                
                    //Inicia o movimento a cada "moveinterval"ms.
                    move = setInterval(function(){
                        //Calcula a distância atual;
                        var currentdistance = target.offsetTop - container.scrollTop - margintop;
                
                        //Verifica se chegou no destino
                        if(initialdistance*currentdistance<=0){
                            //Se chegou no destino, então finaliza o setInterval() e se ajusta ao elemento alvo; 
                            clearInterval(move);
                            container.scrollTop = target.offsetTop - margintop;
                        } else {
                            //Se não chegou no destino, então faz o movimento;
                            container.scrollTop += velocity;
                        }
                    },moveinterval);
                    
                } 
            }
            break;
        }
        while ((e = e.parentNode) != this);
    })
})();