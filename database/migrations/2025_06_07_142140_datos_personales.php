<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('language', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });


        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('identification');
            $table->string('cellphone');
            $table->string('email');
            $table->string('location');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('foto');
            $table->string('fotoThumbrl');
            $table->string('cv_file');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->text('url');
            $table->string('icon');
            $table->string('background_color');
            $table->string('text_color');
            $table->string('hover_color');
            $table->string('hover_background_color');
            
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);

            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('level');
            $table->string('profession');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('city');
            $table->string('country');
            $table->text('description');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->string('icon');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->string('icon');
            $table->date('start_date');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->text('video_url')->nullable();
            $table->enum('type', ['presentation', 'project']);
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('url')->nullable();
            $table->string('image');
            $table->string('first_label')->nullable();
            $table->string('first_url_gihub')->nullable();
            $table->string('second_label')->nullable();
            $table->string('second_url_gihub')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
        
        Schema::create('project_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    
       Schema::create('project_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade');           
            $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('cascade');           
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
     
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('position');
            $table->longText('description');
            $table->longText('achievements');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(1);
            $table->string('company_logo');
            $table->string('company_website');
            $table->string('company_location');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
     
        Schema::create('work_experience_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_experience_id');
            $table->foreign('work_experience_id')->references('id')->on('work_experience')->onUpdate('cascade');
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('work_experience_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_experience_id');
            $table->foreign('work_experience_id')->references('id')->on('work_experience')->onUpdate('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('cascade');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('url')->nullable();
            $table->string('icon');
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('language');
            $table->boolean('status')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
