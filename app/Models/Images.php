<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Images extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'id','title'
    ];
    
    protected $hidden = [
        'created_at', 'updated_at',
        ];
    protected $table =  'images';

    public function upload_image($title) 
    {
        
        $image_id = DB::table('images')->insertGetId([
            'title' => $title
    
        ]);
        return $image_id;
    }
   
        
}
