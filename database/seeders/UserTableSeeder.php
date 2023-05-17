<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ja insere os 3 users fakes
        // User::factory()->count(3)->create();

        //Coloca os usuarios em uma variavel
        // $user = User::factory()->count(3)->make();

        //Da na mesma que o primeiro mas é meio obscuro para leitura
        // User::factory(3)->create();

        //Quando existe um relacionamento ja cria os dados preenchendo as duas tabelas relacionadas, has server pra um usuario que tem um endereço, 1 para 1
        // User::factory()->count(3)->has(Address::factory())->create();

        //Mesma coisa que o anterior, só que usa um metodo magico para chamar o factory de Address
        User::factory()->count(3)->hasAddress()->create();

        // User::create([
        //     'name' => 'Katarina',
        //     'email' => 'k@gmail.com',
        //     'password' => bcrypt('123')
        // ]);
    }
}
