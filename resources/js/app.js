require('./bootstrap');

import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();


let xmlhttp = new XMLHttpRequest() ;

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let messages = JSON.parse(this.response) ;
                messages.forEach(message => {
                    let html = '<div class="messageConatainer"><div class="heure">'+message.created_at.substr(11, 5)+'</div><div class="message"><div class="userInfo"><div class="photoContainer"><img src="./images/inspirations/user.png" alt=""></div><div class="nomUser"></div></div><div class="textContainer"><p class="textMessage">'+message.contenu+'</p></div></div></div>' ;
                    let d1 = document.querySelector("#add");
                    d1.insertAdjacentHTML('afterbegin', html);
                });
            }else{
                let erreur = JSON.parse(this.response);
                alert(erreur.message);
            }
        }
    } ;

    xmlhttp.open("GET", "ajax/messages?id=1") ;


    xmlhttp.send()
