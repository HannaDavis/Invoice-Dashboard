<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $casts = ['is_admin' => 'boolean'];
    protected $fillable = ['name'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('m/d/Y');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopeOriginal($query)
    {
        return $query->where('id', '<', 5);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
