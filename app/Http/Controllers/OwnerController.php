<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Event;
use App\HostCategory;
use App\Http\Requests\CreateHostRequest;
use App\Icon;
use App\Owner;
use App\OwnerInfo;
use App\Photo;
use App\Social;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index','featuredIndex']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang, Request $request)
    {
        $categories=HostCategory::all();
        $category=$request['host_category_id']!=0 ? ['host_category_id','=',$request['host_category_id']] : ['id','>',0];
        $name=$request['name']!=NULL ? ['name','LIKE',"%{$request['name']}%"] : ['id','>',0];
        $selectedCategory=$request['host_category_id'];
        $typed=$request['name'];
        $hosts=Owner::where([$category,$name])
            ->orderBy('featured','desc')
            ->paginate(20);
        return view('host.index',compact('categories','hosts','selectedCategory','typed'));
    }
    public function featuredIndex($lang, Request $request)
    {
        $categories=HostCategory::all();
        $category=$request['host_category_id']!=0 ? ['host_category_id','=',$request['host_category_id']] : ['id','>',0];
        $name=$request['name']!=NULL ? ['name','LIKE',"%{$request['name']}%"] : ['id','>',0];
        $featured=['featured','=','1'];
        $selectedCategory=$request['host_category_id'];
        $typed=$request['name'];
        $hosts=Owner::where([$category,$name,$featured])
            ->paginate(20);
        return view('host.index',compact('categories','hosts','selectedCategory','typed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=HostCategory::all();
        return view('host.create',compact('categories'));
    }
    public function createDetails($lang, $id)
    {
        $host=Owner::findOrFail($id);
        return view('host.createDetails',compact('host'));
    }
    public function createSocial($lang, $id)
    {
        $host=Owner::findOrFail($id);
        return view('host.createSocial',compact('host'));
    }
    public function createAmenities($lang, $id)
    {
        $host=Owner::findOrFail($id);
        $icons=Icon::all();
        return view('host.createAmenities',compact('host','icons'));
    }
    public function createPhotos($lang, $id)
    {
        $host=Owner::findOrFail($id);
        return view('host.createPhotos',compact('host'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHostRequest $request)
    {
        $input=$request->all();
        $host=Owner::create($input);
        return redirect()->to(app()->getLocale().'/host/create/details/'.$host->id);
    }
    public function storeDetails (Request $request)
    {
        $input=$request->all();
        $host=OwnerInfo::create($input);
        return redirect()->to(app()->getLocale().'/host/create/social/'.$host->owner_id);
    }
    public function storeSocial (Request $request)
    {
        $input=$request->all();
        $host=Social::create($input);
        return redirect()->to(app()->getLocale().'/host/create/amenities/'.$host->owner_id);
    }
    public function storeAmenities (Request $request)
    {
        $input=$request->all();
        $amenities=Amenity::create($input);
        return redirect()->to(app()->getLocale().'/host/create/photos/'.$amenities->owner_id);
    }
    public function storePhotos(Request $request){
        if($file=$request->file('file')){
            $name=time().$file->getClientOriginalName();
            Image::make($request->file('file'))->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('images/uploads/'.$name);
            Photo::create(['file'=>$name,'owner_id'=>$request['owner_id']]);
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
        $today=date('Y-m-d');
        $host=Owner::where('slug',$slug)->first();
        $hostDetails=OwnerInfo::where('owner_id', $host->id)->first();
        $hostSocial=Social::where('owner_id',$host->id)->first();
        $hostAmenities=Amenity::where('owner_id',$host->id)->first();
        $icons=Icon::all();
        $hostPhotos=Photo::where('owner_id',$host->id)->get();
        $pastEvents=Event::where([['owner_id','=',$host->id],['date_from','<',$today]])->paginate(6);
        $comingEvents=Event::where([['owner_id','=',$host->id],['date_from','>=',$today]])->paginate(6);

        return view('host.show',compact('host','hostDetails','hostSocial','hostAmenities','hostPhotos','icons','comingEvents','pastEvents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $host=Owner::findOrFail($id);
        $hostDetails=OwnerInfo::where('owner_id',$id)->first();
        $hostSocial=Social::where('owner_id',$id)->first();
        $photos=Photo::where('owner_id',$id)->get();
        $amenities=Amenity::where('owner_id',$id)->first();
        $icons=Icon::all();
        $categories=HostCategory::all();
        return view('host.edit',compact('host','hostDetails','hostSocial','photos','amenities','icons','categories'));
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
        $host=Owner::findOrFail($id);
        $host->update($input);
        return redirect()->back()->with('success', 'Edited successfully!');
    }
    public function updateDetails(Request $request,$locale, $id)
    {
        $input=$request->all();
        $hostDetails=OwnerInfo::where('owner_id',$id)->first();
        $hostDetails->update($input);
        return redirect()->back()->with('success', 'Edited details successfully!');
    }
    public function updateSocial(Request $request,$locale, $id)
    {
        $input=$request->all();
        $social=Social::where('owner_id',$id)->first();
        $social->update($input);
        return redirect()->back()->with('success', 'Edited Social Media successfully!');
    }
    public function updateAmenities(Request $request,$locale, $id)
    {
        $input=$request->all();
        $amenities=Amenity::where('owner_id',$id)->first();
        $reset=[
            'wifi'=>NULL,
            'pet'=>NULL,
            'disabled'=>NULL,
            'music'=>NULL,
            'parking'=>NULL,
            'airc'=>NULL,
            'sauna'=>NULL,
            'spa'=>NULL,
            'gym'=>NULL,
            'pool'=>NULL,
            'smoke'=>NULL,
            'no_smoke'=>NULL,
            'credit'=>NULL,
            'conference'=>NULL,
            'child'=>NULL,
            'vegan_food'=>NULL,
            'vegan_wines'=>NULL,
            'seafood'=>NULL,
            'steakhouse'=>NULL
        ];
        $amenities->update($reset);
        $amenities->update($input);
        return redirect()->back()->with('success', 'Edited Amenities successfully!');
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
        return view('host.success');
    }
}
