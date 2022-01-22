<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Nunito", sans-serif;
    }

    html, body {
    background: linear-gradient(120deg, #17bebb, #f0a6ca);
    overflow: hidden;
    }

    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    width: 100vw;
    }
    .container h1 {
    margin: 0.5em auto;
    color: #FFF;
    text-align: center;
    }

    .chatbox {
    background: rgba(255, 255, 255, 0.05);
    width: 600px;
    height: 75%;
    border-radius: 0.2em;
    position: relative;
    box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.1);
    }
    .chatbox__messages:nth-of-type(odd) .chatbox__messages__user-message--ind-message {
    float: right;
    }
    .chatbox__messages:nth-of-type(odd) .chatbox__messages__user-message--ind-message:after {
    content: "";
    position: absolute;
    margin: -1.5em -17.06em;
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-right: 10px solid rgba(255, 255, 255, 0.2);
    }
    .chatbox__messages:nth-of-type(even) .chatbox__messages__user-message--ind-message {
    float: left;
    }
    .chatbox__messages:nth-of-type(even) .chatbox__messages__user-message--ind-message:after {
    content: "";
    position: absolute;
    margin: -1.5em 1.87em;
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid rgba(255, 255, 255, 0.2);
    }
    .chatbox__messages__user-message {
    width: 450px;
    }
    .chatbox__messages__user-message--ind-message {
    background: rgba(255, 255, 255, 0.2);
    padding: 1em 0;
    height: auto;
    width: 65%;
    border-radius: 5px;
    margin: 2em 1em;
    overflow: auto;
    }
    .chatbox__messages__user-message--ind-message > p.name {
    color: #FFF;
    font-size: 1em;
    }
    .chatbox__messages__user-message--ind-message > p.message {
    color: #FFF;
    font-size: 0.7em;
    margin: 0 2.8em;
    }
    .chatbox__user-list {
    background: rgba(255, 255, 255, 0.1);
    width: 25%;
    height: 100%;
    float: right;
    border-top-right-radius: 0.2em;
    border-bottom-right-radius: 0.2em;
    }
    .chatbox__user-list h1 {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9em;
    padding: 1em;
    margin: 0;
    font-weight: 300;
    text-align: center;
    }
    .chatbox__user, .chatbox__user--away, .chatbox__user--busy, .chatbox__user--active {
    width: 0.5em;
    height: 0.5em;
    border-radius: 100%;
    margin: 1em 0.7em;
    }
    .chatbox__user--active {
    background: rgba(23, 190, 187, 0.8);
    }
    .chatbox__user--busy {
    background: rgba(252, 100, 113, 0.8);
    }
    .chatbox__user--away {
    background: rgba(255, 253, 130, 0.8);
    }
    .chatbox p {
    float: left;
    text-align: left;
    margin: -0.25em 2em;
    font-size: 0.7em;
    font-weight: 300;
    color: #FFF;
    width: 200px;
    }
    .chatbox form {
    background: #222;
    }
    .chatbox form input {
    background: rgba(255, 255, 255, 0.03);
    position: absolute;
    bottom: 0;
    left: 0;
    border: none;
    width: 75%;
    padding: 1.2em;
    outline: none;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
    }

    ::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.9);
    }

    :-moz-placeholder {
    color: rgba(255, 255, 255, 0.9);
    }

    ::-moz-placeholder {
    color: rgba(255, 255, 255, 0.9);
    }

    :-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.9);
    }
</style>

<x-app-layout>
    <div class='container' ng-cloak ng-app="chatApp">
        <h1>Swanky Chatbox UI With Angular</h1>
        <div class='chatbox' ng-controller="MessageCtrl as chatMessage">
            <div class='chatbox__user-list'>
                <h1>User list</h1>
                <div class='chatbox__user--active'>
                <p>Jack Thomson</p>
                </div>
                <div class='chatbox__user--busy'>
                <p>Angelina Jolie</p>
                </div>
                <div class='chatbox__user--active'>
                <p>George Clooney</p>
                </div>
                <div class='chatbox__user--active'>
                <p>Seth Rogen</p>
                </div>
                <div class='chatbox__user--away'>
                <p>John Lydon</p>
                </div>
            </div>
            <div class="chatbox__messages" ng-repeat="message in messages">
                <div class="chatbox__messages__user-message">
                <div class="chatbox__messages__user-message--ind-message">
                    <p class="name">{{message.Name}}</p>
                    <br/>
                    <p class="message">{{message.Message}}</p>
                </div>
                </div>
            </div>
            <form>
                <input type="text" placeholder="Enter your message">
            </form>
        </div>
    </div>
</x-app-layout>
