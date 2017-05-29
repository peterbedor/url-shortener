<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Url;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrlsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_user_can_create_a_url()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user);

		Url::createUrl([
			'url' => 'http://www.google.com'
		]);

		$url = Url::where('url', 'http://www.google.com')->first();

		$this->assertEquals(1, $url->id);
		$this->assertEquals($user->id, $url->user_id);
	}

	/** @test */
	public function can_retrieve_users_urls()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user);

		Url::createUrl([
			'url' => 'http://www.google.com'
		]);

		$this->assertEquals(1, count($user->urls()));
	}
}
