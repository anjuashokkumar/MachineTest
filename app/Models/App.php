<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model
{
    use HasFactory;
    protected $fillable = [
        'startup_name',
        'founder_name',
        'email',
        'phone',
        'website',
        'sector',
        'file',
        'check_me'
    ];
}
