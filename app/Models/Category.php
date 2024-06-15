<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'categories';

    // Many to Many relationship
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'category_task', 'category_id', 'task_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
