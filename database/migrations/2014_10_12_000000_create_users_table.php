<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['username', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
