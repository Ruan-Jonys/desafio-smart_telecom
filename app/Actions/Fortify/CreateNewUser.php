<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // Validação dos novos inputs
            'cnpj' => ['required', 'string', 'size:18', 'unique:users'], // CNPJ
            'zipcode' => ['required', 'string', 'size:9'], // CEP
            'address' => ['required', 'string', 'max:255'], // Endereço
            'neighborhood' => ['required', 'string', 'max:255'], // Bairro
            'city' => ['required', 'string', 'max:255'], // Cidade
            'state' => ['required', 'string', 'size:2'], // Estado
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                // Cadastro dos novos inputs
                'cnpj' => $input['cnpj'], // CNPJ
                'zipcode' => $input['zipcode'], // CEP
                'address' => $input['address'], // Endereço
                'neighborhood' => $input['neighborhood'], // Bairro
                'city' => $input['city'], // Cidade
                'state' => $input['state'], // Estado
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
