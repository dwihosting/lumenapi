<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklists extends Model 
{
    protected $fillable = ['template_id','description', 'due_interval', 'due_unit'];
}

?>