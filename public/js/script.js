let lastId = 1 ;

function scrollDown() {
    let elem = document.getElementById('add');
    elem.scrollTop = elem.scrollHeight;
}

function chargerMessages(){
    let xmlhttp = new XMLHttpRequest() ;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let messages = JSON.parse(this.response) ;
                messages.forEach(message => {
                    let html = '<div class="messageConatainer"><div class="heure">'+message.created_at.substr(11, 5)+'</div><div class="message"><div class="userInfo"></div><div class="textContainer"><p class="textMessage"><span class="nomUser">'+message.user.name+'</span><br>'+message.contenu+'</p></div></div></div>' ;
                    let html2 = '<div class="messageConatainer sent"><div class="message sent"><div class="userInfo"><div class="nomUser"</div></div></div><div class="textContainer"><p class="textMessage"><span class="nomUser">'+message.user.name+'</span><br>'+message.contenu+'</p></div></div><div class="heure sent">'+message.created_at.substr(11, 5)+'</div></div>';
                    let d1 = document.querySelector("#add");
                    if (message.user_id == 14) 
                        d1.insertAdjacentHTML('beforeend', html);
                    else
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

function listenTextArea(entre){
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
}

