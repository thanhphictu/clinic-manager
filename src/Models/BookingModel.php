<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;


class BookingModel extends Model
{
    protected $table = 'booking';
    public $fillable = [
        'id', 'doctorid', 'customerName', 'customerEmail', 'date', 'timetype', 'note', 'status', 'token', 'created_at', 'update_date'
    ];
}
