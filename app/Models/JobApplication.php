<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['attachment', 'application_letter', 'status_id'];

    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
