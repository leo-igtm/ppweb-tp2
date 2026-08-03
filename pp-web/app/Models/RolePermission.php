<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'manage_users',
        'create_property',
        'edit_any_property',
        'edit_own_property',
        'delete_any_property',
        'delete_own_property',
    ];

    protected $casts = [
        'manage_users' => 'boolean',
        'create_property' => 'boolean',
        'edit_any_property' => 'boolean',
        'edit_own_property' => 'boolean',
        'delete_any_property' => 'boolean',
        'delete_own_property' => 'boolean',
    ];
}
