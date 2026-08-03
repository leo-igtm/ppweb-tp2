<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RolePermission;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Check if user has admin role
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user has agente role
     */
    public function isAgente(): bool
    {
        return $this->role === 'agente';
    }

    /**
     * Check if user has gerente role
     */
    public function isGerente(): bool
    {
        return $this->role === 'gerente';
    }

    /**
     * Check if user has cliente role
     */
    public function isCliente(): bool
    {
        return $this->role === 'cliente';
    }

    /**
     * Get permissions for the user's role.
     *
     * @return array<string, bool>
     */
    public function permissions(): array
    {
        $rolePermission = RolePermission::where('role', $this->role)->first();

        if ($rolePermission) {
            return [
                'manage_users' => $rolePermission->manage_users,
                'create_property' => $rolePermission->create_property,
                'edit_any_property' => $rolePermission->edit_any_property,
                'edit_own_property' => $rolePermission->edit_own_property,
                'delete_any_property' => $rolePermission->delete_any_property,
                'delete_own_property' => $rolePermission->delete_own_property,
            ];
        }

        return config('permissions.'.$this->role, config('permissions.cliente'));
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermission(string $permission): bool
    {
        return (bool) ($this->permissions()[$permission] ?? false);
    }

    /**
     * Check if user can edit a property.
     */
    public function canEditProperty(Propiedad $propiedad): bool
    {
        if ($this->hasPermission('edit_any_property')) {
            return true;
        }

        return $this->hasPermission('edit_own_property') && $propiedad->agente_id === $this->id;
    }

    /**
     * Check if user can delete a property.
     */
    public function canDeleteProperty(Propiedad $propiedad): bool
    {
        if ($this->hasPermission('delete_any_property')) {
            return true;
        }

        return $this->hasPermission('delete_own_property') && $propiedad->agente_id === $this->id;
    }

    /**
     * Get the properties for this user (agente)
     */
    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'agente_id');
    }
}
