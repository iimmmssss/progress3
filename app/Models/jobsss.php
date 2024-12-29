<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobsss extends Model
{
    use HasFactory;

    protected $table = 'jobsss';

    protected $fillable = [
        'job_title',
        'company',
        'location',
        'description',
        'salary',
    ];

    // Relasi ke applications
    public function applications()
    {
        return $this->hasMany(applications::class);
    }
}
