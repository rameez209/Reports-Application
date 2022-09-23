<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            // To delete the reports for the deleted users, use the onDelete('cascade') function
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('Department')->nullable();
            $table->string('report_name')->nullable();
            $table->string('key_terms')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('validated_by')->nullable();
            $table->string('frequency')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('screenshot')->nullable();
            $table->longText('description')->nullable();
            $table->string('run_report_description')->nullable(); // Descriptions for how to run the report 
            $table->string('data_extract_location_link')->nullable(); // Link for data extract location 
            $table->string('data_extract_location_screenshot')->nullable(); // Screenshot for data extract location
            $table->string('report_example_screenshot')->nullable(); // screenshot for report example
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
