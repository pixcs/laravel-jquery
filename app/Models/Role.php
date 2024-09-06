<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];
}
