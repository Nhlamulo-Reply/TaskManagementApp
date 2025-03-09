<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssignedToToTasksTable extends Migration
{
    public function up()
    {
//        Schema::table('tasks', function (Blueprint $table) {
//            $table->unsignedBigInteger('assigned_to')->nullable(); // Add this line
//            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
//        });
    }

    public function down()
    {
//        Schema::table('tasks', function (Blueprint $table) {
//            $table->dropForeign(['assigned_to']);
//            $table->dropColumn('assigned_to');
//        });
    }
}
