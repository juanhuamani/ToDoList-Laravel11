<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = ['name', 'description', 'completed', 'date', 'slug'];

    public function getCompletedAttribute($value): bool
    {
        return (bool) $value;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Many to Many relationship
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_task', 'task_id', 'category_id');
    }
}
