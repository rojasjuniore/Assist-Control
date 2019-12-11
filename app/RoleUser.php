<?php

namespace App;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    public function rol()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
