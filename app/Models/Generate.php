<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{
    protected $fillable = [
    	'day',
        'start',
		'end',
		'read',
        'teacher_id',
		'major_id',
		'room_id',
		'lesson_id',
        'user_id',
        'role_id'
    ];

    public function major()
    {
    	return $this->belongsTo(Major::class);
    }

    public function lesson()
    {
    	return $this->belongsTo(lesson::class);
    }

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function day()
    {
        return ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
    }

    public function approvals()
    {
        return $this->belongsToMany(Approval::class);
    }

    public function istirahat()
    {
        return $this->teacher_id == null;
    }
}
