<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
                [
                    'name'      => 'Luca',
                    'surname'   => 'Rossi',
                    'email'     => 'luca@gmail.com',
                    'password'  => Hash::make('luca'),
                ],
                [
                    'name'       => 'Andrea',
                    'surname'    => 'Rossi',
                    'email'      => 'andrea@gmail.com',
                    'password'   => Hash::make('andrea'),
                ],
                [
                    'name'      => 'Nicola',
                    'surname'   => 'Rossi',
                    'email'     => 'nbuzzigoli@gmail.com',
                    'password'  => Hash::make('nicola'),
                ],
                [
                    'name'      => 'Giulio',
                    'surname'   => 'Rossi',
                    'email'     => 'giulio@gmail.com',
                    'password'  => Hash::make('giulio'),
                ],
                [
                    'name'      => 'Simone',
                    'surname'   => 'Rossi',
                    'email'     => 'simone@gmail.com',
                    'password'  => Hash::make('simone'),
                ],

            ]);
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
