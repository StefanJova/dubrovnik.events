<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\HostCategory;
use App\Owner;
use App\PlacesToSee;
use App\Reservation;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function events($lang, Request $request)
    {
        $categories=EventCategory::all();
        $category=$request['event_category_id']!=0 ? ['event_category_id','=',$request['event_category_id']] : ['id','>',0];
        $name=$request['name']!=NULL ? ['name','LIKE',"%{$request['name']}%"] : ['id','>',0];
        $selectedCategory=$request['event_category_id'];
        $typed=$request['name'];
        $events=Event::where([$category,$name])
            ->orderBy('featured','desc')
            ->paginate(20);
        return view('admin.events',compact('categories','events','selectedCategory','typed'));

    }
    public function hosts($lang, Request $request)
    {
        $categories=HostCategory::all();
        $category=$request['host_category_id']!=0 ? ['host_category_id','=',$request['host_category_id']] : ['id','>',0];
        $name=$request['name']!=NULL ? ['name','LIKE',"%{$request['name']}%"] : ['id','>',0];
        $selectedCategory=$request['host_category_id'];
        $typed=$request['name'];
        $hosts=Owner::where([$category,$name])
            ->paginate(20);
        return view('admin.hosts',compact('categories','hosts','selectedCategory','typed'));
    }
    public function landmarks($lang)
    {
        $landmarks=PlacesToSee::all();
        return view('admin.landmarks',compact('landmarks'));
    }
    public function resNew($lang)
    {
        $reservations=Reservation::where('done',0)->orderBy('created_at','desc')->paginate(20);
        return view('reservations.index',compact('reservations'));
    }
}
