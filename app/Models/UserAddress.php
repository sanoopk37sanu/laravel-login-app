<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_address';

    protected $primaryKey = 'address_id';

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
        //second to current    }
    }
}
