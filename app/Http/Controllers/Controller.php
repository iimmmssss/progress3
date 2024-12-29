<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;


abstract class Controller
{
    public function showJobWithApplications($jobId)
{
    // Mengambil semua lamaran terkait dengan job tertentu
    $job = JobsssController:: with('applications')->find($jobId);

    if (!$job) {
        return response()->json(['message' => 'Job not found'], 404);
    }

    return view('jobs.show', compact('job'));
}

public function showApplicationWithJob($applicationId)
{
    // Mengambil job terkait untuk aplikasi tertentu
    $application = ApplicationsController::with('jobsss')->find($applicationId);

    if (!$application) {
        return response()->json(['message' => 'Application not found'], 404);
    }

    return view('applications.show', compact('application'));
}

}
