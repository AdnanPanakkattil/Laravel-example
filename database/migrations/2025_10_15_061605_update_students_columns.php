<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStudentsColumns extends Migration
{
    public function up()
{
    Schema::table('students', function (Blueprint $table) {
        $table->text('first_name')->nullable()->change();
        $table->string('last_name', 255)->nullable()->change();
        $table->integer('age')->nullable()->change();
        $table->string('address', 255)->nullable()->change();
        $table->string('mother_name', 255)->nullable()->change();
        $table->string('mobile', 20)->nullable()->change();
        $table->renameColumn('father_name', 'guardian_name');
    });
}
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Revert changes
            $table->string('first_name', 191)->nullable(false)->change();
            $table->string('last_name', 255)->nullable()->change();
            $table->string('age', 255)->nullable()->change();
            $table->string('address', 191)->nullable(false)->change();
            $table->string('mother_name', 255)->nullable()->change();
            $table->string('mobile', 191)->nullable(false)->change();
            $table->renameColumn('guardian_name', 'father_name');
        });
    }
}

