<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    //
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function list()
	 {
		 $items = Categories::orderBy('name', 'asc')->get();
		 return view(
			 'categories.list',
			 [
				 'title' => 'Kategorijas',
				 'items' => $items
			 ]
		 );
	 }
	
	public function create()
	{
		 return view(
			'categories.form',
			 [
				//'title' => 'Pievienot autoru'
				'title' => 'Pievienot kategoriju',
				'categories' => new Categories()

			 ]
		 );
	}
	
	public function put(Request $request)
	{
		 $validatedData = $request->validate([
			'name' => 'required',
		 ]);
		 $categories = new Categories();
		 $categories->name = $validatedData['name'];
		 $categories->save();
		 return redirect('/categories');
	}
	
	public function update(Categories $categories)
	{
		 return view(
			'categories.form',
			 [
			 'title' => 'Rediģēt kategoriju',
			 'categories' => $categories
			 ]
		 );
	}
	
	public function patch(Categories $categories, Request $request)
	{
		 $validatedData = $request->validate([
			'name' => 'required',
		 ]);
		 $categories->name = $validatedData['name'];
		 $categories->save();
		 return redirect('/categories');
	}
	
	public function delete(Categories $categories)
	{
		 $categories->delete();
		 return redirect('/categories');
	}

}
