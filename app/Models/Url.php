<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
	use SoftDeletes;

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public static function createUrl(array $data): Url
	{
		$url = new Url();
		$url->url = $data['url'];
		$url->user_id = Auth::id();
		$url->hash = base_convert(123456789, 10, 36);
		$url->save();

		return $url;
	}
}
