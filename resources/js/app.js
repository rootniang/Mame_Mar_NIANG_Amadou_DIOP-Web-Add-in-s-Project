require('./bootstrap');

import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();


let xmlhttp = new XMLHttpRequest() ;

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                
                let messages = JSON.parse(this.response) ;
                console.log(messages) ;
            }else{
                
                let erreur = JSON.parse(this.response);
                alert(erreur.message);
            }
        }
    } ;

    xmlhttp.open("GET", "ajax/messages?id=1") ;


    xmlhttp.send()
