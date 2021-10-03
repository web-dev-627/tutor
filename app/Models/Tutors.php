<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tutors extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'country', 'also', 'major', 'tuition', 'character', 'option', 'des', 'image', 'video', 'availability'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $table =  'tutors';

    public function read_country()
    {
        return DB::table('nationality')->get();
    }
    public function read_lang()
    {
        return DB::table('also_speaks')->get();
    }
    public function read_subject()
    {
        return DB::table('teaching_subjects')->get();
    }

    public function read_language()
    {
        return DB::table('languages')->get();
    }

    public function get_tutors()
    {
        return Tutors::select('tutors.*', 'images.title as image_title', 'videos.v_title')
            ->leftjoin('images', 'tutors.image', '=', 'images.id')
            ->leftjoin('videos', 'tutors.video', '=', 'videos.v_id')
            ->get();
    }

    public function read_tutors()
    {
        return Tutors::select('tutors.*', 'images.title as image_title', 'videos.v_title')
            ->leftjoin('images', 'tutors.image', '=', 'images.id')
            ->leftjoin('videos', 'tutors.video', '=', 'videos.v_id')
            ->paginate(10);
        //return Tutors::paginate(10); 
    }

    public function update_imageName($tutor_id, $image_id)
    {
        Tutors::where('tutors.id', $tutor_id)->update(['image' => $image_id]);
    }
    public function update_videoName($tutor_id, $video_id)
    {
        Tutors::where('tutors.id', $tutor_id)->update(['video' => $video_id]);
    }



    public function update_availability($id, $schedule)
    {
        Tutors::where('user_id', $id)
            ->update(['availability' => $schedule]);
    }

    public function get_schedule_model($id)
    {
        return (Tutors::where('user_id', $id)
            ->select('availability')
            ->get());
    }
}
