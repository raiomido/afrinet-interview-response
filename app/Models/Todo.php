<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App\Models
 * @property $task_name
 * @property $completed
 */
class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['task_name', 'completed'];
}
