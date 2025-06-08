<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    protected $fillable = ['code', 'name', 'status', 'order'];

    public $timestamps = true;

    public function personalInformations() {
        return $this->hasMany(PersonalInformation::class);
    }

    public function socialMedias() {
        return $this->hasMany(SocialMedia::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function presentations() {
        return $this->hasMany(Presentation::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function workExperiences() {
        return $this->hasMany(WorkExperience::class);
    }

    public function workExperienceTasks() {
        return $this->hasMany(WorkExperienceTask::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }


}
