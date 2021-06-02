<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'salary', 'is_negotiable', 'company', 'location', 'category_id', 'type_id', 'status_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function applications() {
        return $this->hasMany(JobApplication::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
