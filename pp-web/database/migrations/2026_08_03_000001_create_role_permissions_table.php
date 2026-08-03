<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique();
            $table->boolean('manage_users')->default(false);
            $table->boolean('create_property')->default(false);
            $table->boolean('edit_any_property')->default(false);
            $table->boolean('edit_own_property')->default(false);
            $table->boolean('delete_any_property')->default(false);
            $table->boolean('delete_own_property')->default(false);
            $table->timestamps();
        });

        $defaults = config('permissions');

        foreach ($defaults as $role => $permissions) {
            DB::table('role_permissions')->insert([
                'role' => $role,
                'manage_users' => (bool) ($permissions['manage_users'] ?? false),
                'create_property' => (bool) ($permissions['create_property'] ?? false),
                'edit_any_property' => (bool) ($permissions['edit_any_property'] ?? false),
                'edit_own_property' => (bool) ($permissions['edit_own_property'] ?? false),
                'delete_any_property' => (bool) ($permissions['delete_any_property'] ?? false),
                'delete_own_property' => (bool) ($permissions['delete_own_property'] ?? false),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('role_permissions');
    }
};
