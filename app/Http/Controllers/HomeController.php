<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\HostCategory;
use App\Icon;
use App\Owner;
use App\PlacesToSee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lang, Request $request)
    {
        $hostCategories=HostCategory::all();
        $eventCategories=EventCategory::all();
        $today=date('Y-m-d');
        $dateCheck=['date_from','>=',$today];
        $featuredCheck=['featured','=',1];
        $latFeaEvents=Event::where([$dateCheck,$featuredCheck])->limit(15)->orderBy('id','desc')->get();
        $latEvents=Event::where([$dateCheck])->orderBy('id','desc')->get();
        $catHosts=Owner::where('featured',1)->get();
        $landmarks=PlacesToSee::all();


        return view('welcome',compact('hostCategories','eventCategories','latEvents','latFeaEvents','catHosts','landmarks'));
    }
    public function privacy(){
        return view('privacy-policy');
    }
    public function about($lang){
        return view('about');
    }
    public function contact($lang){
        return view('contact');
    }
    public function contactSend($lang, Request $request){
        dd($request->all());
    }
}
