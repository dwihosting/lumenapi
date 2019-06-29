<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    protected $fillable = [
        'object_domain', 'object_id', 'description', 'is_completed', 'update_by', 'due', 'urgency'
    ];

}
