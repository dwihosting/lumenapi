<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model 
{
    protected $fillable = ['template_id','checklist_id','description', 'urgency', 'due_interval', 'due_unit'];
}

?>