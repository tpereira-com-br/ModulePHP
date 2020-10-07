var move;
(function(){
    class scrollto {
        constructor(target="html", margintop = "head", duration=2000, container = "html") {
            this.target = target;
            this.margintop = margintop;
            this.duration = duration;
            this.container = container;
    
            //Seleciona o container que contém o scroll.
            //Padrão: "html";
            this.container = document.querySelector(this.container);
            
            //Verifica se existe menu fixo no topo, o menu deve estar com a class "menufixedtop";
            if(document.querySelector(this.margintop)){
                this.margintop = document.querySelector(margintop).getBoundingClientRect().height; 
            }
    
            //Busca o elemento alvo;
             this.target = document.querySelector(this.target);
            
            //Intervalo com que o movimento vai ocorrer em ms.
            //Mais lento = Mais fluido e mais consumo de recursos. 
            //Padrão: 10;
             this.moveinterval  = 10;
    
            //Calcula o número de vezes que o setInterval irá execultar;
            this.movenumber = this.duration/this.moveinterval;
    
            //Distância do elemento até o topo da tela;
            this.initialdistance = this.target.offsetTop - this.container.scrollTop - this.margintop;
    
            //Calcula a velocidade inicial.
            this.velocity = (this.initialdistance)/(this.movenumber);
    
            //Define uma velocidade mínima e máxima. Padrão: 5, infinito;
            this.minimumvelocity = 5, this.maximumvelocity = Infinity;
            if (Math.abs(this.velocity)<this.minimumvelocity) {
                this.velocity=this.minimumvelocity * this.velocity/Math.abs(this.velocity);
            } else if (Math.abs(this.velocity)>this.maximumvelocity) {
                this.initialvelocity=this.maximumvelocity * this.velocity/Math.abs(this.velocity);
            }
        }
    
        move(){
            //Finaliza scrolls anteriores caso existam.
            clearInterval(move);

            function movement(obj) {
                obj.movement(obj);
            }
            var obj = this;
            var moveinterval = this.moveinterval;
            //Inicia o movimento a cada "moveinterval"ms.
            move = setInterval(function(){movement(obj)}, this.moveinterval);
            //setInterval(function(){this.movement()},this.moveinterval);
        }

        movement(){
            //Calcula a distância atual;
            this.currentdistance = this.target.offsetTop - this.container.scrollTop - this.margintop;
    
            //Verifica se chegou no destino
            console.log(this.target.offsetTop, this.container.scrollTop);
            console.log(this.currentdistance);
            if(this.initialdistance*this.currentdistance<=0){
                //Se chegou no destino, então finaliza o setInterval() e se ajusta ao elemento alvo; 
                clearInterval(move);
                this.container.scrollTop = this.target.offsetTop - this.margintop;
            } else {
                //Se não chegou no destino, então faz o movimento;
                this.container.scrollTop += this.velocity;
            }
        }
    }

    var trigger = document.querySelectorAll("[scrollto]");
    var scroll = [];
    for (let i = 0; i < trigger.length; i++) {
        scroll[i] = new scrollto(trigger[i].getAttribute("scrollto"), ".menufixedtop");
        trigger[i].onclick = function(){scroll[i].move()};
    }

    
})();



/*
function scrollto(target="html", margintop = "head", duration=2000, container = "html") {
    //Finaliza scrolls anteriores caso existam.
    clearInterval(move);

    //Seleciona o container que contém o scroll.
    //Para mudar deve substituir os getBoundingClientRect().height por clientHeight;
    //Para mudar deve substituir os target.getBoundingClientRect().top por (container.scrollTop - target.offsetTop) 
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
/*function scrollto(e, d, f, m) {
    var m = document.querySelector(m),
        i = 1e3 / f,
        h = document.querySelector('html'),
        d_ms = 1e3 * d;
    m = null == m ? 0 : m.clientHeight;
    var e = document.querySelector(e),
        sp = h.scrollTop,
        ep,
        ep = (ep = e.offsetTop - m) < 0 ? 0 : ep,
        sdt = Math.abs(sp - ep),
        sd,
        ppm = sdt / d / f,
        sc = setInterval(mv, i);

    function mv() {
        var cp = h.scrollTop;
        if (sp > ep) var t = cp <= ep,
            c = !0;
        else var t = cp >= ep,
            c = !1;
        if (t)(h.scrollTop = ep), clearInterval(sc);
        else {
            var rc = 10,
                cdt = Math.abs(cp - ep);
            if (cdt < 0.1 * sdt)
                if (ppm / rc < 5) var cp = c ? cp - 5 : cp + 5;
                else var cp = c ? cp - ppm / rc : cp + ppm / rc;
            else if (cdt < 0.2 * sdt)
                if (ppm / (rc / 2) < 5) var cp = c ? cp - 5 : cp + 5;
                else
                    var rc = rc < 2 ? 2 : rc,
                        cp = c ? cp - ppm / (rc / 2) : cp + ppm / (rc / 2);
            else var cp = c ? cp - ppm : cp + ppm;
            h.scrollTop = cp;
        }
    }
}*/