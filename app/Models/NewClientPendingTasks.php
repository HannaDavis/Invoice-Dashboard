<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewClientPendingTasks extends Model
{
    protected $table = 'new_client_registry_notifications';
    use HasFactory;
}
