<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStudentsTableNameColumns extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the old first_name and last_name columns
            $table->dropColumn(['first_name', 'last_name']);

            // Rename 'name' to 'first_name'
            $table->renameColumn('name', 'first_name');
        });

        // Add new 'last_name' column after renaming
        Schema::table('students', function (Blueprint $table) {
            $table->string('last_name', 255)->nullable()->after('first_name');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Revert last_name and first_name changes
            $table->dropColumn('last_name');
            $table->renameColumn('first_name', 'name');

            // Add back old first_name and last_name columns
            $table->string('first_name', 255)->nullable()->after('name');
            $table->string('last_name', 255)->nullable()->after('first_name');
        });
    }
}

