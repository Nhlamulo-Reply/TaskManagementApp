<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Nette\Schema\Schema;

class Task extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'status', 'user_id'];
    protected $dates = ['due_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  assignee()
    {
        return $this->belongsTo(User::class);
    }

}
