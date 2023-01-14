<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandDefaultList extends Model
{
    use HasFactory;
    protected $table = "command_default_list";
    protected $fillable = [
        'cmd',
        'description',
        'command_type_id',
    ];
}
