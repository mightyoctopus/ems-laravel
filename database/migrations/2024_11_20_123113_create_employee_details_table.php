<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BloodTypeEnum;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
                  ->constrained('employees')
                  ->onDelete('cascade');
            $table->float('height');
            $table->float('weight');
            $table->integer('age');
            $table->enum('blood_type', BloodTypeEnum::getBloodTypes())
                  ->default(BloodTypeEnum::A)
                  ->comment('Blood type of the employee');
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
        Schema::dropIfExists('employee_details');
    }
}
