<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $profile_photo
 * @property string|null $address
 * @property string $role
 * @property string $status
 * @property Carbon|null $last_login_at
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Booking[] $bookings
 * @property Collection|Operator[] $operators
 * @property Collection|SeatLock[] $seat_locks
 *
 * @package App\Models
 */


class User extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'last_login_at' => 'datetime',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'profile_photo',
		'address',
		'role',
		'status',
		'last_login_at',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}

	public function operators()
	{
		return $this->hasMany(Operator::class);
	}

	public function seat_locks()
	{
		return $this->hasMany(SeatLock::class);
	}
}
