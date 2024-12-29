<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToJobsssTable extends Migration
{
    public function up()
    {
        Schema::table('jobsss', function (Blueprint $table) {
            if (!Schema::hasColumn('jobsss', 'updated_at')) { // Tambahkan pengecekan kolom
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('jobsss', function (Blueprint $table) {
            if (Schema::hasColumn('jobsss', 'updated_at')) { // Pengecekan sebelum menghapus kolom
                $table->dropColumn('updated_at');
            }
        });
    }
}
