<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobIdToApplicationsTable extends Migration
{
    public function up()
{
    Schema::table('applications', function (Blueprint $table) {
        if (!Schema::hasColumn('applications', 'job_id')) { // Tambahkan pengecekan kolom
            $table->unsignedBigInteger('job_id')->after('id');
            $table->foreign('job_id')->references('id')->on('jobsss')->onDelete('cascade');
        }
    });
}


    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropColumn('job_id');
        });
    }
}
