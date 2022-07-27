<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::withTrashed()->orderBy('id', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function table()
    {
    	$categories = Category::withTrashed()->orderBy('id', 'desc')->get();

        return view('admin.categories.table', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
    	$validatedData = $request->validated();

        Category::create($validatedData + [
			'slug' => Str::slug($validatedData['name']),
		]);

        if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Category added successfully !',
        	]);
        }

        return redirect()->route('categories.index')->with('success', 'Category added successfully !');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit-request', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
    	$validatedData = $request->validated();

    	$category->update($validatedData + [

			'slug' => (Str::slug($validatedData['name'])),
    	]);

    	if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Category updated successfully !',
        	]);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully !');
    }

    public function destroy($category)
    {
    	$categoryDeleted = Category::destroy($category);
    	if(request()->ajax())
    	{
    		if (! $categoryDeleted)
    		{
	    		return response()->json([
	    			'type' => 'error',
	    			'msg' => 'Sorry! Category not found !'
	    		]);
    		}
			return response()->json([
				'type' => 'success',
				'msg' => 'Category moved to trash !'
			]);
    	}

    	if (! $categoryDeleted)
    	{
    		return redirect()->route('categories.index')->with('error', 'Sorry! Category not found.');
    	}

    	return redirect()->route('categories.index')->with('success', 'Category moved to trash !');
    }

    public function restore($category)
    {
    	$category = Category::onlyTrashed()->where('id', $category)->firstOrFail();

    	if(request()->ajax())
    	{
    		if ($category->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Category Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Category for restoration not found'
    		]);
    	}
    	if ($category->restore())
    	{
    		return redirect()->route('categories.index')->with('success', 'Category Restored Successfully !');
    	}

    	return redirect()->route('categories.index')->with('error', 'Sorry! Category for restoration not found');
    }

    public function forceDestroy($category)
    {
    	$category = Category::onlyTrashed()->where('id', $category)->firstOrFail();

    	if(request()->ajax())
    	{
    		if ($category->forceDelete())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Category Deleted !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Category not found.'
    		]);
    	}
    	if ($category->forceDelete())
    	{
    		return redirect()->route('categories.index')->with('success', 'Category Deleted !');
    	}

    	return redirect()->route('categories.index')->with('error', 'Sorry! Category not found.');
    }
}
