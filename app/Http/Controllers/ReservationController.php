<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $reservations=Reservation::orderBy('created_at','desc')->paginate(20);
        return view('reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $input=$request->all();
        $input['done']=0;
        $reservation=Reservation::create($input);
        return redirect('/'.app()->getLocale())->with('resCreated', 'Reservation created.');
    }
    public function done($lang, $id){
        $reservation=Reservation::findOrFail($id);
        $input['done']=1;
        $reservation->update($input);
        return redirect()->back()->with('status','Reservation done');

    }
    public function undone($lang, $id){
        $reservation=Reservation::findOrFail($id);
        $input['done']=0;
        $reservation->update($input);
        return redirect()->back()->with('status','Reservation not done');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($lang, $id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->back()->with('status','Reservation deleted');

    }
}
