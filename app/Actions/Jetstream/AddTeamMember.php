<?php

namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Events\AddingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Rules\Role;

class AddTeamMember implements AddsTeamMembers
{
    /**
     * Add a new team member to the given team.
     * Se o usuário não existir, cria com username, email e senha.
     *
     * @param  User       $user     Usuário que está adicionando
     * @param  Team       $team     Time ao qual será adicionado o membro
     * @param  string     $email    Email do novo membro
     * @param  string|null $role    Papel do novo membro
     * @param  string|null $username Nome de usuário para criação (se novo)
     * @param  string|null $password Senha para criação (se novo)
     * @return void
     */
    public function add(User $user, Team $team, string $email, ?string $role = null, ?string $username = null, ?string $password = null): void
    {
        // Verifica permissão
        Gate::forUser($user)->authorize('addTeamMember', $team);

        // Validação básica
        $this->validate($team, $email, $role);

        // Busca usuário pelo email
        $newTeamMember = User::where('email', $email)->first();

        if (!$newTeamMember) {
            // Cria usuário novo se não existir
            $newTeamMember = User::create([
                'name' => $username ?? $email,
                'email' => $email,
                'password' => Hash::make($password ?? 'defaultpassword123'), // Senha obrigatória idealmente
            ]);
        }

        // Evento antes de adicionar membro
        AddingTeamMember::dispatch($team, $newTeamMember);

        // Adiciona ao time com papel
        $team->users()->attach($newTeamMember->id, ['role' => $role]);

        // Evento após adição
        TeamMemberAdded::dispatch($team, $newTeamMember);
    }

    /**
     * Validar dados do membro que será adicionado.
     *
     * @param Team $team
     * @param string $email
     * @param string|null $role
     * @return void
     */
    protected function validate(Team $team, string $email, ?string $role): void
    {
        Validator::make([
            'email' => $email,
            'role' => $role,
        ], $this->rules(), [
            'email.exists' => __('We were unable to find a registered user with this email address.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Regras de validação.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function rules(): array
    {
        return array_filter([
            'email' => ['required', 'email'],
            'role' => Jetstream::hasRoles()
                            ? ['required', 'string', new Role]
                            : null,
        ]);
    }

    /**
     * Garante que usuário não está já no time.
     *
     * @param Team $team
     * @param string $email
     * @return Closure
     */
    protected function ensureUserIsNotAlreadyOnTeam(Team $team, string $email): Closure
    {
        return function ($validator) use ($team, $email) {
            $validator->errors()->addIf(
                $team->hasUserWithEmail($email),
                'email',
                __('This user already belongs to the team.')
            );
        };
    }
}
