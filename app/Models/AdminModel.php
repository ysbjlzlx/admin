<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'admin';
    protected $primaryKey = 'id';
}
