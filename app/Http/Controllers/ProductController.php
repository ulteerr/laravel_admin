<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;


class ProductController
{

	public function index()
	{
		$products = Product::paginate();

        return ProductResource::collection($products);
	}

	public function show($id)
	{
        return new ProductResource(Product::find($id));
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
