let lastId = 1 ;


/* Permet de scroller vers le bas afin de voir les messages dernierement envoye */
function scrollDown() {
    let elem = document.getElementById('add');
    elem.scrollTop = elem.scrollHeight;
}


/* Chargement des messages  */
function chargerMessages(){
    let userid = document.querySelector("#userid").value;
    let xmlhttp = new XMLHttpRequest() ;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let messages = JSON.parse(this.response) ;
                messages.forEach(message => {
                    let html = '<div class="messageConatainer"><div class="heure">'+message.created_at.substr(11, 5)+'</div><div class="message"><div class="userInfo"></div><div class="textContainer"><p class="textMessage"><span class="nomUser">'+message.user.name+'</span><br>'+message.contenu+'</p></div></div></div>' ;
                    let html2 = '<div class="messageConatainer sent"><div class="message sent"><div class="userInfo"><div class="nomUser"</div></div></div><div class="textContainer"><p class="textMessage"><span class="nomUser">'+message.user.name+'</span><br>'+message.contenu+'</p></div></div><div class="heure sent">'+message.created_at.substr(11, 5)+'</div></div>';
                    let d1 = document.querySelector("#add");
                    if (message.user_id == userid) // Message envoyé
                        d1.insertAdjacentHTML('beforeend', html);
                    else //Message reçu
                        d1.insertAdjacentHTML('beforeend', html2);

                    scrollDown();
                    console.log(lastId);
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


/* Enregistrement du message dans la base de donnee */
function ajouterMessage() {
    let message = document.querySelector("#message").value ;
    if(message != ""){
        let data = {} ;
        data["message"] = message ;
        let xmlhttp = new XMLHttpRequest() ;
        let dataJSON = JSON.stringify(data) ;
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 201) {
                    document.querySelector("#message").value = "" ;
                    }
                }else{
                    let erreur = this.response;
                    console.log(erreur) ;
                }
            } ;
        xmlhttp.open("POST", "ajax/send");
        xmlhttp.send(dataJSON); 
    }    

}

function userConnected() {
    let userid = document.querySelector("#userid").value;
    let xmlhttp = new XMLHttpRequest() ;
    let elements = document.querySelectorAll(".anUser");
    if(elements){
        Array.prototype.forEach.call(elements, (node) =>{
            node.parentNode.removeChild(node) ;
        });
    }  
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let users = JSON.parse(this.response) ;
                users.forEach(user => {
                    let html = '<div class="anUser"><img src="images/inspirations/iconUser.png" alt="" class="iconUser"><p class="otherUserName">'+user.user.name+'</p></div>'
                    let d1 = document.querySelector(".otherUsersContainer");
                    d1.insertAdjacentHTML('beforeend', html);
                });
            }else{
                let erreur = JSON.parse(this.response);
                alert(erreur.message);
            }
        }
    } ;

    xmlhttp.open("GET", 'ajax/user') ;
    xmlhttp.send() ;
}

function listenTextArea(entre) {
    if(entre.key == "Enter"){
        ajouterMessage() ;
    }
}

window.onload = () => {
    let message = document.querySelector("#message");
    message.addEventListener("keyup", listenTextArea);

    let sender = document.querySelector("#sender");
    sender.addEventListener("click", ajouterMessage);

    chargerMessages();
    setInterval(chargerMessages, 1000);

    userConnected();
    setInterval(userConnected, 10000);
}

