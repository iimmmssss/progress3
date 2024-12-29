<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'job_id',
        'applicant_name',
        'email',
        'resume',
    ];

    // Relasi ke job
    public function job()
    {
        return $this->belongsTo(jobsss::class);
    }
}
