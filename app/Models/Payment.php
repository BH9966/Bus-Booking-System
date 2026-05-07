<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $id
 * @property int $booking_id
 * @property string $payment_method
 * @property string|null $provider_name
 * @property string|null $phone_number
 * @property string|null $transaction_ref
 * @property float $amount
 * @property string $currency
 * @property string $status
 * @property Carbon|null $paid_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Booking $booking
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';

	protected $casts = [
		'booking_id' => 'int',
		'amount' => 'float',
		'paid_at' => 'datetime'
	];

	protected $fillable = [
		'booking_id',
		'payment_method',
		'provider_name',
		'phone_number',
		'transaction_ref',
		'amount',
		'currency',
		'status',
		'paid_at'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}
}
