class Login{
    constructor(user,pw,token){
        this.form = new FormData;
        this.setUser(user);
        this.setPw(pw);
        this.setToken(token);
    }

    dataValidate(){
        if(!this.user || this.pw < 8){
            this.alert("Usuário ou senha incorreta!");
            return false;
        } else {
            return true;
        }        
    }

    alert(alert){
        if (alert) {
            this.alertText = alert;
        }
        window.alert(this.alertText);
    }

    setUser(user){
        this.user = user;
        this.form.set("user", btoa(user));
    }

    setPw(pw){
        this.pw = pw;
        this.form.set("pw", btoa(pw));
    }

    setToken(token){
        this.token = token;
        this.form.set("token", btoa(token));
    }

    async send(){
        const response = await fetch("controller/login",{
            method:"POST",body:this.form
        })
        const result = await response.json();
        this.alert(result.status);
        if (result.login) {
            window.location.href = "/";
        }
    }
}

function login(token){
    var user = document.querySelector("#loginuser[name=loginuser]").value,
    pw = document.querySelector("#loginpw[name=loginpw]").value,
    login = new Login(user,pw,token);
    if(login.dataValidate()){
        login.send();
    };  
}