<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'description',
        'subtotal',
        'tax',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name'=>'Hanna']);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function accountant()
    {
        return $this->belongsTo(Accountant::class);
    }
}
