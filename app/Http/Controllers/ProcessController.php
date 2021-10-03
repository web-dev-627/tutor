<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutors;
use App\Models\Images;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;

class ProcessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    //show login form
    public function indexlogin()
    {
        return redirect('login');
    }

    public function indexlogout()
    {
        return redirect('/');
    }
    //show homepage
    public function homepage(Request $request)
    {

        if (!$request->ajax()) {
            /* retrieve datas from database*/
            $tutor_model = new Tutors();
            $all_tutors = $tutor_model->read_tutors();

            $country =  $tutor_model->read_country();
            $alsospeak =  $tutor_model->read_lang();
            $subject =  $tutor_model->read_subject();
            $language = $tutor_model->read_language();
            
        
            /* send data from controller to view*/
            $data['t_data'] = $all_tutors;
            $data['countries'] = $country;
            $data['alsospeaks'] = $alsospeak;
            $data['subjects'] = $subject;
            $data['languages'] = $language;
            return view('pages.home', $data);
        }
    }


    public function register_tutor()
    {
        $nationality_model = new Tutors();
        $country = $nationality_model->read_country();
        $alsospeak = $nationality_model->read_lang();
        $subject = $nationality_model->read_subject();
        $language = $nationality_model->read_language();

        $data['countries'] = $country;
        $data['alsospeaks'] = $alsospeak;
        $data['subjects'] = $subject;
        $data['languages'] = $language;
        return view('pages.register_tutor', $data);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'tutor_name' => 'required',
            'tutor_country' => 'required',
            'tutor_also' => 'required',
            'tutor_language' => 'required',
            'tutor_major' => 'required',
            'tutor_tuition' => 'required|numeric',
            'tutor_character' => 'required',
            'tutor_des' => 'required',
            'fileUpload' => 'mimes:jpeg,jpg,webp,png,mp4|required|max:100000',
        ]);


        //get input and store into variables
        $t_name = $request->tutor_name;
        $t_country = $request->tutor_country;
        $t_id = $request->tutor_id;
        $data = $request->tutor_also;
        $data['tutor_also'] = implode(',', $request->tutor_also);
        $t_language = $request->tutor_language;
        $t_major = $request->tutor_major;
        $t_tuition = $request->tutor_tuition;
        $t_character = $request->tutor_character;
        $t_option = $request->tutor_option;
        $t_des = $request->tutor_des;
        $file = $request->fileUpload;
        $file_video = $request->fileUpload_video;

        //create new object
        $inTutor = new Tutors();
        $inImage = new Images();
        $inVideo = new Videos();
        
        //set all input to insert to db
        $inTutor->name = $t_name;
        $inTutor->user_id = Auth::user()->id;
        $inTutor->country = $t_country;
        $inTutor->native_language = $t_language;
        $inTutor->also = $data['tutor_also'];
        $inTutor->major = $t_major;
        $inTutor->tuition = $t_tuition;
        $inTutor->character = $t_character;
        $inTutor->option = $t_option;
        $inTutor->des = $t_des;

        //save to db
        $inTutor->option = ($t_option == "on") ? 1 : 0;
        $inTutor->save();

        //update the role from 3 -> 2 in user model

        User::where('id', Auth::user()->id)
            ->update(['role' => 2]);

        //$inUser->role = 2;
        //$inUser->save();

        if ($file) {
            $destinationPath = 'public/images/'; // upload path
            $imageName = $inTutor->id . time() . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $imageName);
            $image_id = $inImage->upload_image($imageName);

            $inTutor->update_imageName($inTutor->id, $image_id);
            $save['title'] = "$imageName";
        }

        if ($file_video) {
            $destinationPath = 'public/videos/'; // upload path

            $videoName = $inTutor->id . time() . "." . $file_video->getClientOriginalExtension();
            $file_video->move($destinationPath, $videoName);
            //dd("$videoName");
            $video_id = $inVideo->upload_video($videoName);

            //dd($video_id);
            $inTutor->update_videoName($inTutor->id, $video_id);
            $save['title'] = "$videoName";
        }
        //Session::flash('message', "Insert Tutor success!");

        $datas['t_data'] = $inTutor;

        return redirect('home');
    }


    //first landing page search function
    public function general_search_2(Request $request)
    {
        $name = $request->name;
        $search = Tutors::where('name', 'like', "%$name%")->paginate(6);

        $tutor_model = new Tutors();
        $country =  $tutor_model->read_country();
        $alsospeak =  $tutor_model->read_lang();
        $subject =  $tutor_model->read_subject();
        $language = $tutor_model->read_language();

        /* send data from controller to view*/
        $data['t_data'] = $search;
        $data['countries'] = $country;
        $data['alsospeaks'] = $alsospeak;
        $data['subjects'] = $subject;
        $data['languages'] = $language;
        $data['keyword'] = $name;

        return view('pages.home', $data);
    }


    //dynamic search.
    public function general_search(Request $request)
    {
        $major = $request->major;
        $country = $request->country;
        $tuition = $request->tuition;
        $native_lang = $request->native_lang;
        $also = $request->also;
        $name = $request->name;
        $from = $request->from;
        $to = $request->to;
        $page = $request->page;

        $search = Tutors::select('tutors.*', 'images.title as image_title', 'videos.v_title')->leftjoin('images', 'tutors.image', '=', 'images.id')->leftjoin('videos', 'tutors.video', '=', 'videos.v_id')->where('major', 'like', "%$major%")->where('country', 'like', "%$country%")->where('native_language', 'like', "%$native_lang%")->where('also', 'like', "%$also%")->where('name', 'like', "%$name%")->wherebetween('tuition', [$from, $to])->paginate(6);
        $data = array(
            't_data' => $search,
            //'page_index' => $page,
        );
        return view('pages.search_result', $data);
    }

    public function schedule(Request $request)
    {


        $data['schedule'] = $request->schedule_data;
        $data['user_id'] = $request->tutor_id;


        $tutor_schedule = new Tutors();
        $tutor_schedule->update_availability($data['user_id'], $data['schedule']);

        $arr = array(
            'message' => 'Successfully saved!',
            'title' => 'Schedule'
        );
        return $arr;
        //echo json_encode($arr);
    }

    public function show_schedule() {
        $tutor = new Tutors();
        $id = Auth::user()->id;

        $someArray = json_decode($tutor->get_schedule_model($id), true);
        //$someArray = $tutor->get_schedule_model($id);
        
        // dump($someArray);
        // dump($someArray[0]["availability"]);
        $result = $someArray[0]["availability"];
        $data["schedule"] = $result;
        return view('pages.schedule',$data);



        //dump($result["day"]);
        // foreach($someArray as $obj)
        // {
        //     //dump($obj->getTable());
        //     dump($obj->getFillable());
        //     dump($obj->getAttributes());


        // }
        //dd($someArray);    
        //dd ($someArray[0][day]);

        
        
    }




}
