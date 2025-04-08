<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Columns extends Model
{
    use HasFactory;

    protected $table = 'columns';

    protected $primaryKey = 'column_id'; 

    protected $fillable = [
        'title'
    ];

    public function tasks()
{
    return $this->hasMany(Tasks::class, 'column_id', 'column_id');
}
}
