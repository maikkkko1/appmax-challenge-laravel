<?php

namespace Tests\Unit;

use App\Services\UserService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserServiceTest extends TestCase {
    private $userService;

    public function setUp(): void {
        parent::setUp();

        Artisan::call('migrate');

        $this->userService = new UserService();
    }

    /** @test */
    public function shouldCreateNewUser() {
        $user = [
            'name' => 'Maikon Ferreira',
            'user' => 'maikon',
            'password' => '123'
        ];

        $create = $this->userService->create($user);

        $this->assertEquals($create['name'], $user['name']);
    }
}
