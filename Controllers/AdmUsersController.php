<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
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
		$drivers = Driver::doesntHave('user')->get();
		
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
			'type' => 'required'
		]);
		
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->type = $request->type;
		
		if ($request->type == 'Водитель'){
			$this->validate($request, [
				'driver_id' => 'required|numeric'
			]);
			
			$user->driver_id = $request->driver_id;
		}
		
		$user->save();
		session()->flash('message', 'Новый пользователь успешно добавлен!');
		
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
		
		$drivers = Driver::doesntHave('user')->get();
		
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
		$user = User::find($id);
		
        $this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
		]);
		
		$user->name = $request->name;
		$user->type = $request->type;
		$user->email = $request->email;
		
		if (count(User::where('email', '=', $request->email)->where('id', '<>', $id)->get()) != 0){
			session()->flash('message', 'Данный email уже используется!');
			return redirect()->route('users.edit', $id);
		}
		else{
			if ($request->type != 'Водитель'){
				$user->driver_id = NULL;
			}
			else {
				$this->validate($request, [
					'driver_id' => 'required|numeric'
				]);
				
				$user->driver_id = $request->driver_id;
			}
			
			$user->save();
			session()->flash('message', 'Текущий пользователь успешно обновлён!');
			
			return redirect()->route('users.index');
		}
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
		session()->flash('message', 'Текущий пользователь успешно удалён!');
		
		return redirect()->route('users.index');
    }
}
