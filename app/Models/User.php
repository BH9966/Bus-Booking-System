<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property int|null $created_by
 * @property int|null $company_id
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
 * @property Company|null $company
 * @property User|null $user
 * @property Collection|Booking[] $bookings
 * @property Collection|Bus[] $buses
 * @property Collection|Company[] $companies
 * @property Collection|Location[] $locations
 * @property Collection|Route[] $routes
 * @property Collection|SeatLock[] $seat_locks
 * @property Collection|Trip[] $trips
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'created_by' => 'int',
		'company_id' => 'int',
		'last_login_at' => 'datetime',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'created_by',
		'company_id',
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

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}

	public function buses()
	{
		return $this->hasMany(Bus::class, 'created_by');
	}

	public function companies()
	{
		return $this->hasMany(Company::class, 'owner_user_id');
	}

	public function locations()
	{
		return $this->hasMany(Location::class, 'created_by');
	}

	public function routes()
	{
		return $this->hasMany(Route::class, 'created_by');
	}

	public function seat_locks()
	{
		return $this->hasMany(SeatLock::class);
	}

	public function trips()
	{
		return $this->hasMany(Trip::class, 'created_by');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'created_by');
	}
}
