<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('nominations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('image')->nullable();
                $table->string('gender');
                $table->string('linkedin_url')->nullable();
                $table->string('bio')->nullable();
                $table->string('business_name')->nullable() ;
                $table->string('reason_for_nomination')->nullable();
                $table->integer('no_of_nominations')->default(0);
                $table->integer('no_of_votes')->default(0);
                $table->boolean('is_admin_selected')->default(0);
                $table->boolean('has_won')->default(0);
                $table->integer('user_id')->unsigned()->index();
                $table->integer('category_id')->unsigned()->index();
                $table->softDeletes();
                $table->timestamps();
            });
            //

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominations');
    }
}
