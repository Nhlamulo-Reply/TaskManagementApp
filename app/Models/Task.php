<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Nette\Schema\Schema;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'status', 'user_id', 'assigned_to']; // Add 'assigned_to' here
    protected $dates = ['due_date'];

    // Relationship to the user who created the task
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to the user assigned to the task
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
