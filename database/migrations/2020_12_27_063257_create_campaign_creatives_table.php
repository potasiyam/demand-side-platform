<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'campaign_creatives',
            function (Blueprint $table) {
                $table->id();
                $table->integer('campaign_id')->unsigned();
                $table->string('file_name');
                $table->string('file_path');
                $table->string('file_extension');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_creatives');
    }
}
