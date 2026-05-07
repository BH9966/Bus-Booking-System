<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Operator
 * 
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $license_no
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Bus[] $buses
 *
 * @package App\Models
 */
class Operator extends Model
{
	protected $table = 'operators';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'company_name',
		'license_no',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function buses()
	{
		return $this->hasMany(Bus::class);
	}
}
