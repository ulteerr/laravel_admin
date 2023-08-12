<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Storage;
use Str;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

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

	public function store(Request $request)
	{
		$file = $request->file('image');
		$name = Str::random(10);
		$url = Storage::putFileAs('images', $file, $name);
		$product = Product::create([

			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'image' => $url,
			'price' => $request->input('price'),
		]);
		return response($product, HttpFoundationResponse::HTTP_CREATED);
		$file->extension();
	}

	public function update(Request $request, $id)
	{
		$file = $request->file('image');
		$name = Str::random(10);
		$url = Storage::putFileAs('images', $file, $name);
		$product = Product::find($id)->update([

			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'image' => $url,
			'price' => $request->input('price'),
		]);
		return response($product, HttpFoundationResponse::HTTP_CREATED);
		$file->extension();
	}

	public function destroy($id)
	{
	}
}
