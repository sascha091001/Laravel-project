<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
		//$drivers = Driver::all();
		
		$arr = ['Обычный', 'Водитель', 'Админ'];
		$drivers = DB::table('drivers')->select('drivers.id', 'drivers.FIO')->leftjoin('users', 'drivers.id', '=', 'users.driver_id')->where('users.driver_id', '=', NULL)->get();
		
		if (count($drivers) == 0){
			unset($arr[array_search('Водитель', $arr)]);
		}
		
        return view('adminpages.UserCreate', ['drivers' => $drivers, 'users' => $users, 'arr' => $arr]);
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
		
		if ($request->type != 'Водитель'){
			if ($user->driver){
				$user->driver_id = NULL;
			}
		}
		else{
			$user->driver_id = $request->driver_id;
		}
		
		if ($request->type == 'Водитель' and $request->driver_id == 'Не выбрано'){
			$user->driver_id = NULL;
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
        $user = User::find($id);
		
		return view('adminpages.UserShow', ['user' => $user]);
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
		
		$drivers = DB::table('drivers')->select('drivers.id', 'drivers.FIO')->leftjoin('users', 'drivers.id', '=', 'users.driver_id')->where('users.driver_id', '=', NULL)->get();
		
		if (count($drivers) == 0){
			unset($arr[array_search('Водитель', $arr)]);
		}
		
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
		//dd($request->all());
		$user = User::find($id);
		
        $this->validate($request, [
			'name' => 'required|max:255',
		]);
		
		$user->email = $request->email;
		$user->type = $request->type;
		
		if ($request->type != 'Водитель'){
			if ($user->driver){
				$user->driver_id = NULL;
			}
		}
		else{
			$user->driver_id = $request->driver_id;
		}
		
		if ($request->type == 'Водитель' and $request->driver_id == 'Не выбрано'){
			$user->driver_id = NULL;
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
		$user->reviews()->delete();
		$user->delete();
		return redirect()->route('users.index');
    }
}
