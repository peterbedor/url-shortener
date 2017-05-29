<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token'
	];

	public static function createUser(array $data): User
	{
		$user = new User();
		$user->first_name = $data['firstName'];
		$user->last_name = $data['lastName'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);
		$user->save();

		return $user;
	}
}
