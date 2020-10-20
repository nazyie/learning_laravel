<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('content');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    ///////////////////////////////
    // ARTISAN MIGRATION COMMAND //
    ///////////////////////////////

    /** List of command
     *******************
     
     php artisan migrate --force ~ to force run on production
     php artisan migrate:rollback ~ to rollback the last batch of migration
     php artisan migrate:rollback --step=5 ~ to rollback based on step
     php artisan migrate:reset ~ to rollback all application

     php artisan migrate:refresh ~ rollback all application && migrate
     php artisan migrate:refresh --seed ~ refresh && database seeds
     php artisan migrate:refresh --step=5 ~ refresh according to step
     php artisan migrate:fresh ~ drop the table and execute the migrate


     *
     *
     */

    //////////////
    // MODIFIER //
    //////////////

    /**
     * nullable()
     * unique()
     */

    public function down()
    {
      // Schema::drop('posts');
      Schema::dropIfExists('user_posts');
    }
}
