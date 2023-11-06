<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory;

    #per non eliminare definitivamente
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'price', 'thumb', 'series', 'sale_date', 'type', 'artists', 'writers'];
}
