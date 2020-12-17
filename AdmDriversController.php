<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\User;

class AdmDriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$drivers = Driver::paginate(5);
        return view('adminpages.drivers', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpages.DriverCreate');
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
			'FIO' => 'required|max:40',
			'birthday' => 'required|date',
			'experience' => 'required|numeric|max:50',
			'salary' => 'required|numeric|max:100000',
			'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
		]);
		
		$driver = new Driver;
		$driver->FIO = $request->FIO;
		$driver->birthday = $request->birthday;
		$driver->experience = $request->experience;
		$driver->salary = $request->salary;
		
		$driver->save();
		
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->type = 'Водитель';
		
		$driver->user()->save($user);
		session()->flash('message', 'Новый водитель и аккаунт успешно добавлены!');
		
		return redirect()->route('drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
		return view('adminpages.DriverShow', ['driver' => $driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
		
		return view('adminpages.DriverUpdate', ['driver' => $driver]);
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
		$driver = Driver::find($id);
		
        $this->validate($request, [
			'FIO' => 'required|max:40',
			'birthday' => 'required|date',
			'experience' => 'required|numeric|max:50',
			'salary' => 'required|numeric|max:100000',
		]);
		
		$driver->FIO = $request->FIO;
		$driver->birthday = $request->birthday;
		$driver->experience = $request->experience;
		$driver->salary = $request->salary;
		
		$driver->save();
		session()->flash('message', 'Текущий водитель успешно обновлён!');
		
		return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        foreach ($driver->user->reviews as $review){
            $review->user_id = NULL;
            $review->save;
        }
        
        foreach ($driver->arrivals as $arrival){
            $arrival->driver_id = NULL;
            $arrival->save();
        }
		
        $driver->user()->delete();
		$driver->reviews()->delete();
		
		$driver->delete();
		session()->flash('message', 'Текущий водитель успешно удалён!');
		
		return redirect()->route('drivers.index');
    }
}
