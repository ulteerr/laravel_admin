<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	public function index()
	{
		$users = User::paginate();
		return $users;
	}

	public function show($id)
	{
		$user = User::find($id);
		return $user;
	}
	public function store(UserCreateRequest $request)
	{

		$user = User::create($request->only('first_name','last_name','email'));
		return response($user, Response::HTTP_CREATED);
	}
	public function update(UserUpdateRequest $request, $id)
	{
		$user = User::find($id);
		$user->update($request->only('first_name','last_name','email'));
		return response($user, Response::HTTP_ACCEPTED);
	}
	public function destroy($id)
	{
		User::destroy($id);
		return response(null, Response::HTTP_NO_CONTENT);
	}
}
