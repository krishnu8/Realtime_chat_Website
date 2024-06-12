<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friends extends Model
{
    use HasFactory;
    protected $fillable = ['User1', 'User2', 'Last_message', 'Message_date'];
    public $table="friends";
}
