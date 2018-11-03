<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        $user = new User();
        $user->id = 1;
        $user->name = 'Brandon Carranza';
        $user->email = 'Brandon@hotmail.com';
        $user->password = bcrypt('qwerty');
        $user->save();

        $blog = new Blog();
        $blog->titulo = 'Test1';
        $blog->resumen = 'REsumen1';
        $blog->portada = 1;
        $blog->save();

    }
}
