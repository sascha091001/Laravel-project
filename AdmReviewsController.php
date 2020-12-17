<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Driver;
use App\User;

class AdmReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate(5);
		    return view('adminpages.reviews', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $drivers = Driver::all();
        return view('adminpages.ReviewCreate', ['drivers' => $drivers, 'users' => $users]);
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
          'user_id' => 'required|numeric',
          'driver_id' => 'required|numeric'
        ]);
        
        $review = new Review;
        $review->driver_id = $request->driver_id;
        $review->user_id = $request->user_id;
        $review->text = $request->text;
        
        $review->save();
        session()->flash('message', 'Текущий отзыв успешно добавлен!');
        
        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        
        return view('adminpages.ReviewShow', ['review' => $review]);
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
		
        $users = User::all()->where('id', '<>', $review->user_id);
        $drivers = Driver::all()->where('id', '<>', $review->driver_id);
        
        return view('adminpages.ReviewUpdate', ['review' => $review, 'users' => $users, 'drivers' => $drivers]);
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
        $review = Review::find($id);
        
        $this->validate($request, [
          'text' => 'required|max:255',
          'user_id' => 'required|numeric',
          'driver_id' => 'required|numeric'
        ]);
        
        $review->driver_id = $request->driver_id;
        $review->user_id = $request->user_id;
        $review->text = $request->text;
        
        $review->save();
        session()->flash('message', 'Текущий отзыв успешно обновлён!');
        
        return redirect()->route('reviews.index');
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
        
        return redirect()->route('reviews.index');
    }
}
