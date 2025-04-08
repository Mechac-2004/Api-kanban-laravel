<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'task_id'; 

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'column_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function column()
    {
        return $this->hasMany(Columns::class, 'column_id');
    }
}
