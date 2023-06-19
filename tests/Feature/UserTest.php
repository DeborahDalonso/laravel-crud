<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_if_the_user_is_redirected_to_the_users_index_route_after_login()
    {
        $user = User::create([
            'name' => 'Deborah',
            'password' => bcrypt('123')
        ]);

        //para fazer verificações fazemos usamos os asserts, são ações seguidas de uma verificação 
        // $this->assertDatabaseHas('users', [
        //     'name' => $user->name,
        //     'password' => $user->password
        // ]);

        //existem metodos para todas as requisições de protocolo http, POST, GET, PUT, DELETE
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);

        //Aqui verificamos se usuário criado está autenticado;
        $this->assertAuthenticatedAs($user);

        //Aqui temos duas formas de verificar o encaminhamento 
        $response->assertRedirect();
        //Aqui verificamos se o codigo http retornado é 302, que é o codigo de redirecionamento
        $response->assertStatus(302);

        //Aqui verificamos se o redirecionamento para a tela user.index está funcionando
        $response->assertRedirectToRoute('user.index'); //Lê-se "Está redirecionando pra user.index?"
    }

    public function test_if_the_user_is_redirected_to_the_users_index_route_when_trying_to_access_the_login_route()
    {
        $user = User::create([
            'name' => 'Deborah',
            'password' => bcrypt('123')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);

        $response->get('/login');
        $response->assertRedirectToRoute('user.index');
    }
}
