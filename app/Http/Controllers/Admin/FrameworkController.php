<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Framework;
use Illuminate\Http\Request;
use App\Http\Requests\FrameworkRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class FrameworkController extends Controller
{
    public function index()
    {
    	$frameworks = Framework::withTrashed()->orderBy('id', 'desc')->get();

        return view('admin.frameworks.index', compact('frameworks'));
    }

    public function table()
    {
    	$frameworks = Framework::withTrashed()->orderBy('id', 'desc')->get();

        return view('admin.frameworks.table', compact('frameworks'));
    }

    public function create()
    {
        return view('admin.frameworks.create');
    }

    public function store(FrameworkRequest $request)
    {
    	$validatedData = $request->validated();

        Framework::create($validatedData + [
			'slug' => Str::slug($validatedData['name']),
		]);

        if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Framework added successfully !',
        	]);
        }

        return redirect()->route('frameworks.index')->with('success', 'Framework added successfully !');
    }

    public function edit(Framework $framework)
    {
        return view('admin.frameworks.edit-request', compact('framework'));
    }

    public function update(FrameworkRequest $request, Framework $framework)
    {
    	$validatedData = $request->validated();

    	$framework->update($validatedData + [

			'slug' => (Str::slug($validatedData['name'])),
    	]);

    	if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Framework updated successfully !',
        	]);
        }

        return redirect()->route('frameworks.index')->with('success', 'Framework updated successfully !');
    }

    public function destroy($framework)
    {
    	$frameworkDeleted = Framework::destroy($framework);
    	if(request()->ajax())
    	{
    		if (! $frameworkDeleted)
    		{
	    		return response()->json([
	    			'type' => 'error',
	    			'msg' => 'Sorry! Framework not found !'
	    		]);
    		}
			return response()->json([
				'type' => 'success',
				'msg' => 'Framework moved to trash !'
			]);
    	}

    	if (! $frameworkDeleted)
    	{
    		return redirect()->route('frameworks.index')->with('error', 'Sorry! Framework not found.');
    	}

    	return redirect()->route('frameworks.index')->with('success', 'Framework moved to trash !');
    }

    public function restore($framework)
    {
    	$framework = Framework::onlyTrashed()->where('id', $framework)->firstOrFail();

    	if(request()->ajax())
    	{
    		if ($framework->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Framework Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Framework for restoration not found'
    		]);
    	}
    	if ($framework->restore())
    	{
    		return redirect()->route('frameworks.index')->with('success', 'Framework Restored Successfully !');
    	}

    	return redirect()->route('frameworks.index')->with('error', 'Sorry! Framework for restoration not found');
    }

    public function forceDestroy($framework)
    {
    	$framework = Framework::onlyTrashed()->where('id', $framework)->firstOrFail();

    	if(request()->ajax())
    	{
    		if ($framework->forceDelete())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Framework Deleted !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Framework not found.'
    		]);
    	}
    	if ($framework->forceDelete())
    	{
    		return redirect()->route('frameworks.index')->with('success', 'Framework Deleted !');
    	}

    	return redirect()->route('frameworks.index')->with('error', 'Sorry! Framework not found.');
    }
}
