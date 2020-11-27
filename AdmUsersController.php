<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Driver;

class AdmUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '<>', Auth::user()->id)->paginate(5);
		return view('adminpages.users', ['users' => $users]);
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
        return view('adminpages.UserCreate', ['drivers' => $drivers, 'users' => $users]);
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
			'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
			'type' => 'in:Админ,Обычный,Водитель'
		]);
		
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->type = $request->type;
		if ($request->driver_id == 'Не выбрано'){
			$user->driver_id = NULL;
		}
		else{
			$user->driver_id = $request->driver_id;
		}
		
		$user->save();
		
		return redirect()->route('users.index');
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
        $user = User::find($id);
		
		$arr = ['Обычный', 'Водитель', 'Админ'];
		unset($arr[array_search("$user->type", $arr)]);
		
		$drivers = Driver::all()->where('id', '<>', $user->driver_id);
		return view('adminpages.UserUpdate', ['user' => $user, 'drivers' => $drivers, 'arr' => $arr]);
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
		$user = User::find($id);
		
        $this->validate($request, [
			'name' => 'required|max:255',
		]);
		
		$user->email = $request->email;
		$user->type = $request->type;
		$user->driver_id = $request->driver_id;
		
		if ($request->type != 'Водитель'){
			if ($user->driver){
				$user->driver_id = NULL;
			}
		}
		
		$user->save();
		
		return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
		$user->delete();
		return redirect()->route('users.index');
    }
}
