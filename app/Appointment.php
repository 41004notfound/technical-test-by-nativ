<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Appointment
 *
 * @package App
 *
 * @property int id
 * @property string name
 * @property string phone
 * @property string email
 * @property string message
 * @property Carbon appointment_date
 */
class Appointment extends Model
{
    /** @var string[] */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'appointment_date',
    ];

    protected $casts = [
      'appointment_date' => 'datetime:Y-m-d H:i:s'
    ];
}
