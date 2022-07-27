<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TagController extends Controller
{
	public function index()
	{
		$tags = Tag::withTrashed()->orderByDesc('id')->get();

		return view('admin.tags.index', compact('tags'));
	}

	public function table()
	{
		$tags = Tag::withTrashed()->orderBy('id', 'desc')->get();

		return view('admin.tags.table', compact('tags'));
	}

	public function create()
	{
		return view('admin.tags.create');
	}

	public function store(TagRequest $request)
	{
		$validatedData = $request->validated();

		$slug = Str::slug($validatedData['name']);

		Tag::create($validatedData + [
			'slug' => $slug
		]);

		if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Tag added successfully !',
        	]);
        }

        return redirect()->route('tags.index')->with('success', 'Tag added successfully !');
	}

	public function edit(Tag $tag)
	{
		return view('admin.tags.edit-request', compact('tag'));
	}

	public function update(TagRequest $request, Tag $tag)
	{
		$validatedData = $request->validated();

		$slug = $validatedData['name'];

		$tag->update($validatedData + [
			'slug' => $slug
		]);

		if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Tag added successfully !',
        	]);
        }

        return redirect()->route('tags.index')->with('success', 'Tag added successfully !');
	}

	public function destroy($tag)
	{
		$tagDeleted = Tag::destroy($tag);

		if(request()->ajax())
    	{
    		if ($tagDeleted)
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Tag moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Tag not found.'
    		]);
    	}

    	if ($tagDeleted)
    	{
    		return redirect()->route('tags.index')->with('success', 'Tag moved to trash !');
    	}

    	return redirect()->route('tags.index')->with('error', 'Sorry! Tag not found.');
	}

	public function restore($tag)
	{
		$tag = Tag::onlyTrashed()->where('id', $tag)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($tag->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Tag Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Tag for restoration not found.'
    		]);
    	}

    	if ($tag->restore())
    	{
    		return redirect()->route('tags.index')->with('success', 'Tag Restored Successfully !');
    	}

    	return redirect()->route('tags.index')->with('error', 'Sorry! Tag for restoration not found');
	}

	public function forceDestroy($tag)
	{
		$tag = Tag::onlyTrashed()->where('id', $tag)->firstOrFail();

		if(request()->ajax())
		{
			if ($tag->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Tag Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Tag not found.'
			]);
		}

		if ($tag->forceDelete())
		{
			return redirect()->route('tags.index')->with('success', 'Tag Deleted !');
		}

		return redirect()->route('tags.index')->with('error', 'Sorry! Tag not found.');
	}
}
