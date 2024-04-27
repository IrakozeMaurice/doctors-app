<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'booking_date' => Carbon::date_format('d-M-Y H:m')
    // ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
