<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv_rada', 'naziv_rada_na_engleskom', 'zadatak_rada', 'tip_studija', 'nastavnik_id', 'student_id'];

    public function applications()
    {
        return $this->belongsToMany('App\User', 'users_tasks', 'task_id', 'user_id')->orderBy('priority')->withPivot('priority');
    }

	public function student()
	{
	    return $this->hasOne('App\User', 'id', 'student_id');
	}


}
