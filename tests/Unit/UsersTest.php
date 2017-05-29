<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_user_can_be_created()
	{
		User::createUser([
			'firstName' => 'Peter',
			'lastName' => 'Bedor',
			'email' => 'email@email.com',
			'password' => 'password'
		]);

		$user = User::where('first_name', 'Peter')->first();

		$this->assertEquals(1, $user->id);
    }

	/** @test */
	public function create_user_returns_instance_of_user()
	{
		$user = User::createUser([
			'firstName' => 'Peter',
			'lastName' => 'Bedor',
			'email' => 'email@email.com',
			'password' => 'password'
		]);

		$this->assertInstanceOf(User::class, $user);
    }
}
