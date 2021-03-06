<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'text' => 'required|max:255',
		]);
		
		$review = new Review;
		
        $review->text = $request->text;
		$review->driver_id = $request->driver_id;
		$review->user_id = $request->user_id;
		
		$review->save();
		session()->flash('message', 'Новый отзыв успешно добавлен!');
		
		return redirect()->route('showDriverInfo', $review->driver_id);
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
        $review = Review::find($id);
		
		return view('userpages.updateRev', ['review' => $review]);
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
		$this->validate($request, [
			'text' => 'required|max:255',
		]);
		
        $review = Review::find($id);
		$review->text = $request->text;
		 
		$review->save();
		session()->flash('message', 'Текущий отзыв успешно обновлён!');
		
		return redirect()->route('showDriverInfo', $review->driver_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
		$review->delete();
		session()->flash('message', 'Текущий отзыв успешно удалён!');
		
		return redirect()->route('showDriverInfo', $review->driver_id);
    }
}
