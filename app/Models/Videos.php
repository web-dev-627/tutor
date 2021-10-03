<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Videos extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'v_id','v_title'
    ];
    
    protected $hidden = [
        'created_at', 'updated_at',
        ];
    protected $table =  'videos';

    public function upload_video($title) 
    {
  
        $video_id = DB::table('videos')->insertGetId([
            'v_title' => $title
    
        ]);
    
        return $video_id;
    }
   
        
}
