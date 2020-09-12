<?php

namespace Moolchand\Taknikadmin\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	
	protected $fillable = ['name', 'display_name', 'description'];

	public function permission()
	{
		return $this->belongsToMany(Permission::class);
	}
}
