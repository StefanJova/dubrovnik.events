<?php

namespace App\Http\Controllers;

use App\Http\Requests\LandmarkRequest;
use App\Photo;
use App\PlacesToSee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PTSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PTS.create');
    }
    public function createPhotos($lang, $id)
    {
        $landmark=PlacesToSee::findOrFail($id);
        return view('PTS.createPhotos',compact('landmark'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(LandmarkRequest $request)
    {
        $input=$request->all();
        $landmark=PlacesToSee::create($input);
        return redirect()->to(app()->getLocale().'/landmark/create/photos/'.$landmark->id);
    }
    public function storePhotos(Request $request){
        if($file=$request->file('file')){
            $name=time().$file->getClientOriginalName();
            Image::make($request->file('file'))->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/uploads/'.$name);
            Photo::create(['file'=>$name,'places_to_see_id'=>$request['places_to_see_id']]);
        }
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $slug)
    {
        $landmark=PlacesToSee::where('slug',$slug)->first();
        $notThis=['slug','!=',$slug];
        $otherLandmarks=PlacesToSee::where([$notThis])->take(3)->get();
        return view('PTS.show',compact('landmark','otherLandmarks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang,$id)
    {
        $landmark=PlacesToSee::findOrFail($id);
        $photos=Photo::where('places_to_see_id',$id)->get();
        return view('PTS.edit',compact('landmark','photos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $input=$request->all();
        $landmark=PlacesToSee::findOrFail($id);
        $landmark->update($input);
        return redirect()->back()->with('success', 'Edited successfully!');
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
        return view('PTS.success');
    }
}
