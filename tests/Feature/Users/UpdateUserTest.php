<?php

namespace Feature\Users;

use App\Models\User\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use TestCase;

class UpdateUserTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_bot_can_update_an_user()
    {
        $user = User::factory()->create();
        $payload = [
            'name' => 'daniel coração',
            'nickname' => 'danielhe4rt',
            'git' => 'https://github.com/danielhe4rt',
            'about' => 'eu faço lives codando php',
            'linkedin' => 'https://linkedin.com/in/danielheart'
        ];

        $response = $this->put(
            route('users.update', ['discordId' => $user->discord_id]),
            $payload,
            $this->getHeaders()
        );

        $response->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure(array_keys($user->toArray()))
            ->seeJsonContains($payload);
    }
}