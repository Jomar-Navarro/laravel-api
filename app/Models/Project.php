<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function Technology(){
        return $this-> belongsTo(Technology::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'technology_id',
        'description',
        'project_url',
        'completion_date',
        'image',
        'image_original_name',
    ];
}
