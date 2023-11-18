<?php

namespace App\Models;

use App\Models\Invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function invoices()
    {
        return $this->hasMany(Invoices::class);
    }
}