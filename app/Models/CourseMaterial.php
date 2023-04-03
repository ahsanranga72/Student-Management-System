<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CourseMaterial extends Model
{
    use HasFactory;
    protected $appends = ['file_url'];

    protected $fillable = [
        'name',
        'file'
    ];

    public function getFileUrlAttribute()
    {
        if(Storage::disk('public')->exists('course-material/'.$this->file))
        {
            return $this->attributes['file_url'] = asset(Storage::url('app/public/course-material/'.$this->file));
        }
        else
        {
            return $this->attributes['file_url'] = '';
        }
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
