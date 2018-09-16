<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use App\Persona;

class PersonaProvider extends UserProvider {

    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];  // will depend on the name of the input on the login form
        return ($plain == $user->getAuthPassword() . $user->getAuthKey());
    }

}