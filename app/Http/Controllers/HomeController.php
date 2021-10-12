<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [];
        $display = 'none';
        $key = '';
        $user = Auth::user();
        $recent_search = '';
        if (Auth::user()) {
            $recent_search = Keyword::where('user_id', $user->id)->orderByDesc('id')->take(5)->get();
            if(empty($request->q)){
                return view('frontend.home', compact('data', 'display', 'key', 'recent_search')); 
            }else{
                $display = 'block';
                $token = $user->access_token;
                $key = $request->q;
                $language = $request->local;
                //to check what i need to do increment or new data insert in keyword data table
                $keyword = Keyword::where('user_id', $user->id)->where('keyword', $request->q)->first();
               //return $keyword;
                  if(!empty($keyword)){
                    $keyword->search_count++;
                    $keyword->save();
                  }else{
                    $keyword = new keyword();
                    $keyword->user_id = $user->id;
                    $keyword->keyword = $request->q;
                    $keyword->lang = $request->local;
                    $keyword->save();
                  }
                
                  $data['keywordData'] =  Http::get("https://graph.facebook.com/search?type=adinterest&q=[$key]&limit=10000&locale=$language&access_token=$token");


                return view('frontend.home', compact('data', 'display', 'key', 'recent_search'));
            }
        }else {
            if(empty($request->q)){
                return view('frontend.home', compact('data', 'display', 'key', 'recent_search')); 
            }else{
                return view('frontend.home', compact('data', 'display', 'key', 'recent_search'))->with('message', 'Please Login before search');
            }
            
        }

    }


}
