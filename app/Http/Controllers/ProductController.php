<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController
{

	public function index()
	{
		Product::paginate(10);
	}

	public function show($id)
	{
		
	}

	public function store()
	{
		
	}

	public function update(Request $request, $id)
	{
	
	}

	public function destroy($id)
	{
	
	}
}
