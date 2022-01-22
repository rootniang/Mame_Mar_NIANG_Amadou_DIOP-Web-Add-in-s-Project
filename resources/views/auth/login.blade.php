 <x-guest-layout>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="./images/inspirations/bg2.png" alt="">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Tabbi ci waxtaan wi</h2>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <x-input id="email" 
                            type="email" name="email" 
                            placeholder="Ex : amadou@diop.gdil" 
                            :value="old('email')" required  />
                        
                            <x-input id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Mot de passe"
                                    required autocomplete="current-password" />
                        
                        <input type="submit" name="" value="Se connecter">
                        <p class="register">Vous n'avez pas encore de compte ? alors 
                            <a href="#" onclick="intervertir();">Bëssal fii !</a>
                        </p>
                    </form>
                </div>
            </div>
            
            <!-- Paartie register -->
            <div class="user singupBx">
                <div class="formBx">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2>Bindu ci waxtaan wi</h2>
                        <x-input id="name" type="text" name="name" :value="old('name')" required  placeholder="Nom complet"/>
                        <x-input id="email" type="email" name="email" 
                            :value="old('email')" required placeholder="Votre adresse mail"/>
                        <x-input id="password" type="password" name="password"
                            required autocomplete="new-password" placeholder="Mot de passe" />
                            <x-input id="password_confirmation" type="password"
                            name="password_confirmation" required placeholder="Confirmer le mot de passe"/>
                        <input type="submit" name="" value="Enregistrer">
                        <p class="register">Vous avez dèja un compte ?  
                            <a href="#" onclick="intervertir();">Bëssal fii !</a>
                        </p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="./images/inspirations/bg2.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <script>
        function intervertir() {
            var container = document.querySelector(".container");
            container.classList.toggle('active');
        }
    </script>
</x-guest-layout>

{{-- 
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    --}}