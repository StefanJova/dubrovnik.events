<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\HostCategory;
use App\Http\Requests\CreateEventRequest;
use App\Owner;
use App\OwnerInfo;
use App\Photo;
use App\Social;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($lang, Request $request){
        $categories=EventCategory::all();
        $today=date('Y-m-d');
        $dateCheck=['date_from','>=',$today];
        $category=$request['event_category_id']!=0 ? ['event_category_id','=',$request['event_category_id']] : ['id','>',0];
        $name=$request['name']!=NULL ? ['name','LIKE',"%{$request['name']}%"] : ['id','>',0];
        $selectedCategory=$request['event_category_id'];
        $typed=$request['name'];
        $events=Event::where([$category,$name,$dateCheck])
            ->orderBy('featured','desc')
            ->paginate(20);
        return view('events.index',compact('categories','events','selectedCategory','typed'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hosts=Owner::all();
        $categories=EventCategory::all();
        return view('events.create',compact('hosts','categories'));
    }
    public function createSocial($lang, $id)
    {
        $event=Event::findOrFail($id);
        return view('events.createSocial',compact('event'));
    }
    public function createPhotos($lang, $id)
    {
        $event=Event::findOrFail($id);
        return view('events.createPhotos',compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $input=$request->all();
        $event=Event::create($input);
        return redirect()->to(app()->getLocale().'/event/create/social/'.$event->id);
    }
    public function storeSocial (Request $request)
    {
        $input=$request->all();
        $event=Social::create($input);
        return redirect()->to(app()->getLocale().'/event/create/photos/'.$event->event_id);
    }
    public function storePhotos(Request $request){
        if($file=$request->file('file')){
            $name=time().$file->getClientOriginalName();
            Image::make($request->file('file'))->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/uploads/'.$name);
            Photo::create(['file'=>$name,'event_id'=>$request['event_id']]);
        }
        return true;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $event=Event::findOrFail($id);
        $eventSocial=Social::where('event_id',$id)->first();
        $eventPhotos=Photo::where('event_id',$id)->get();
        $eventCategory=EventCategory::where('id',$event['event_category_id'])->first();
        $host=Owner::findOrFail($event['owner_id']);
        $hostDetails=OwnerInfo::where('owner_id',$host['id'])->first();
        $hostSocial=Social::where('owner_id',$host['id'])->first();
        $hostPhotos=Photo::where('owner_id',$host['id'])->get();
        $hostCategory=HostCategory::where('id',$host['host_category_id'])->first();
        $today=date('Y-m-d');
        $dateCheck=['date_from','>=',$today];
        $notThis=['id','!=',$id];
        $catCheck=['event_category_id','=',$event['event_category_id']];
        $simEvents=Event::where([$dateCheck,$notThis,$catCheck])->orderBy('date_from', 'desc')->take(3)->get();

        return view('events.show',compact('event','eventPhotos','eventSocial','eventCategory','host','hostDetails','hostSocial','hostPhotos','hostCategory','simEvents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $hosts=Owner::all();
        $event=Event::findOrFail($id);
        $eventSocial=Social::where('event_id',$id)->first();
        $photos=Photo::where('event_id',$id)->get();
        $categories=EventCategory::all();
        return view('events.edit',compact('event','hosts','eventSocial','photos','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale, $id)
    {
        $input=$request->all();
        $event=Event::findOrFail($id);
        $event->update($input);
        return redirect()->back()->with('success', 'Edited successfully!');
    }
    public function updateSocial(Request $request,$locale, $id)
    {
        $input=$request->all();
        $social=Social::where('event_id',$id)->first();
        $social->update($input);
        return redirect()->back()->with('success', 'Edited Social Media successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function destroyPhoto($locale, $id)
    {
        $photo= Photo::findOrFail($id);
        unlink(substr($photo->file, 1));
        $photo->delete();
        return redirect()->back();
    }
    public function success($lang){
        return view('events.success');
    }
}
