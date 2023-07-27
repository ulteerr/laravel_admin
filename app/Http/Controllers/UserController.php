<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	public function index()
	{
		$users = User::all();
		return $users;
	}

	public function show($id)
	{
		$user = User::find($id);
		return $user;
	}
	public function store(Request $request)
	{

		$user = User::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'email' => $request->input('email'),
			'password' => Hash::make($request->input('password')),
		]);
		return response($user, Response::HTTP_CREATED);
	}
	public function update(Request $request, $id)
	{
		$user = User::find($id);
		$user->update([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'email' => $request->input('email'),
			'password' => Hash::make($request->input('password')),
		]);
		return response($user, Response::HTTP_ACCEPTED);
	}
	public function destroy($id)
	{
		User::destroy($id);
		return response(null, Response::HTTP_NO_CONTENT);
	}
}
