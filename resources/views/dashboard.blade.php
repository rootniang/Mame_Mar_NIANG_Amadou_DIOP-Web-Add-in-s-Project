<x-app-layout>
    <div><input type="hidden" id="userid" value="{{ Auth::user()->id }}"></div>
    <section>
        <div class="container d-flex">
            <div class="sidebar">
                <div class="logoContainer">
                    <img src="images/inspirations/logo1.png" alt="">
                </div>
                <div class="otherUsersContainer">
                    <p class="listUsers">Liste des utilisateurs</p>
                    <div class="anUser">
                        <img src="images/inspirations/iconUser.png" alt="" class="iconUser">
                        <p class="otherUserName">
                            This is an user name
                        </p>
                    </div>
                    <div class="anUser">
                        <img src="images/inspirations/iconUser.png" alt="" class="iconUser">
                        <p class="otherUserName">
                            This is an user name
                        </p>
                    </div>
                    <div class="anUser">
                        <img src="images/inspirations/iconUser.png" alt="" class="iconUser">
                        <p class="otherUserName">
                            This is an user name
                        </p>
                    </div>
                    <div class="anUser">
                        <img src="images/inspirations/iconUser.png" alt="" class="iconUser">
                        <p class="otherUserName">
                            This is an user name
                        </p>
                    </div>
                    <div class="anUser">
                        <img src="images/inspirations/iconUser.png" alt="" class="iconUser">
                        <p class="otherUserName">
                            This is an user name
                        </p>
                    </div>
                </div>
            </div>
            <div class="chatContainer">
                <div class="headerChat">
                    <div class="userInfoContainer">
                        <img class="userIconImg" src="images/inspirations/iconUser2.png" alt="">
                        <h1 class="userNameHeader">{{ Auth::user()->name }} <br><span class="enLign">en ligne</span></h1>
                    </div>
                    <div class="autreInfos">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')" >
                                <button onclick="event.preventDefault();
                                this.closest('form').submit();" class="deconnexion">Deconnexion</button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="mainChatContainer"  id="add">
                    
                </div>
                <div class="input_containter w-100">
                    <textarea id="message" wrap="off" class="input_text"></textarea>
                    <button id="sender">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
