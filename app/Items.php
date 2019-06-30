<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model 
{
    protected $fillable = ['template_id','checklist_id','assignee_id','description', 'urgency', 'due', 'due_interval', 'due_unit'];
}

?>