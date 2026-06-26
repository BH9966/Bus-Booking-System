<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $company_name
 * @property string $license_no
 * @property string|null $tin
 * @property string|null $vat_no
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $owner_user_id
 * @property int|null $created_by
 * 
 * @property User|null $user
 * @property Collection|Bus[] $buses
 * @property Collection|Trip[] $trips
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';

	protected $casts = [
		'owner_user_id' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'company_name',
		'license_no',
		'tin',
		'vat_no',
		'status',
		'owner_user_id',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'owner_user_id');
	}

	public function buses()
	{
		return $this->hasMany(Bus::class);
	}

	public function trips()
	{
		return $this->hasMany(Trip::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
