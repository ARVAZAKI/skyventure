<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'image',
        'tenant_name',
        'tenant_description',
        'tenant_website',
    ];
}
