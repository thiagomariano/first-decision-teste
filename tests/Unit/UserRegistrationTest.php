<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Registered;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_a_new_user_and_redirects_with_success_message()
    {
        // Simular um evento para evitar o disparo real
        Event::fake();

        // Dados simulados para a requisição
        $data = [
            'name' => 'Thiago Melo',
            'email' => 'thiago@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Enviar uma requisição POST para o método 'store'
        $response = $this->post(route('store'), $data);

        // Verificar se o redirecionamento ocorreu para a rota correta
        $response->assertRedirect(route('lista'));

        // Verificar se a mensagem de sucesso foi enviada na sessão
        $response->assertSessionHas('success', 'Usuário registrado com sucesso!');

        // Verificar se o usuário foi criado no banco de dados
        $this->assertDatabaseHas('users', [
            'name' => 'Thiago Melo',
            'email' => 'thiago@example.com',
        ]);

        // Verificar se o evento 'Registered' foi disparado
        Event::assertDispatched(\Illuminate\Auth\Events\Registered::class);
    }

    /** @test */
    public function it_fails_when_validation_fails()
    {
        // Dados inválidos (sem nome)
        $data = [
            'name' => '',
            'email' => 'invalid-email',
            'password' => '123',
            'password_confirmation' => '456', // Senhas não batem
        ];

        // Enviar a requisição POST
        $response = $this->post(route('store'), $data);

        // Verificar se houve redirecionamento de volta com erros de validação
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
