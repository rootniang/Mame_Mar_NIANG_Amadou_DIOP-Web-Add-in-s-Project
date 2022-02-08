require('./bootstrap');

import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();

let lastId = 1 ;



function chargerMessages(){
    let xmlhttp = new XMLHttpRequest() ;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let messages = JSON.parse(this.response) ;
                messages.forEach(message => {
                    let html = '<div class="messageConatainer"><div class="heure">'+message.created_at.substr(11, 5)+'</div><div class="message"><div class="userInfo"><div class="photoContainer"><img src="./images/inspirations/user.png" alt=""></div><div class="nomUser"></div></div><div class="textContainer"><p class="textMessage">'+message.contenu+'</p></div></div></div>' ;
                    let d1 = document.querySelector("#add");
                    d1.insertAdjacentHTML('afterbegin', html);
                    lastId = message.id ;
                });
            }else{
                let erreur = JSON.parse(this.response);
                alert(erreur.message);
            }
        }
    } ;

    xmlhttp.open("GET", 'ajax/messages?id='+lastId) ;


    xmlhttp.send() ;
} 


setInterval(chargerMessages, 1000) ;

function ajouterMessage() {
    let message = document.querySelector("#message").value ;

    if(message != ""){
        let data = {} ;
        data["message"] = message ;
        dataJSON = JSON.stringify(data) ;

        let xmlhttp = new XMLHttpRequest() ;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 201) {
                    
                    document.querySelector("#message").value = "" ;
                    }
                }else{
                    let erreur = JSON.parse(this.response);
                    alert(erreur.message);
                }
            } ;
        } 

    xmlhttp.open("POST", "ajax/send");

    xmlhttp.send(dataJSON);    

}

function listenTextArea(entre){
    if(entre.key == "Enter"){
        ajoutMessage() ;
    }
}

let message = document.querySelector("#message");
message.addEventListener("keyup", listenTextArea);

let sender = document.querySelector("#sender");
sender.addEventListener("click", ajouterMessage);
