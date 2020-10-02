window.onload=function(){
    var e=document.querySelector("#show_menu"),
    o=document.querySelectorAll(".container_menu_top"),
    t=document.querySelectorAll("[goto]"),
    n=document.querySelector("#enviar"),
    i = 0;
    n&&(n.onclick=function(){
        var e=document.querySelector("#nome").value,
        o=document.querySelector("#email").value,
        t=document.querySelector("#telefone").value,
        n=document.querySelector("#mensagem").value;
        contato(e,o,t,n)
    });
    e&&(e.onclick=function(){slideToggle(o,2)}),

        window.onresize=function(){for(var e=0;e<o.length;e++)o[e].removeAttribute("style")};       
};