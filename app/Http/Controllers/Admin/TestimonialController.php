<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Requests\TestimonialRequest;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestimonialController extends Controller
{
    public function index()
    {
    	$testimonials = Testimonial::withTrashed()->orderBy('id', 'desc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function table()
    {
    	$testimonials = Testimonial::withTrashed()->orderByDesc('id')->get();

        return view('admin.testimonials.table', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(TestimonialRequest $request)
    {
        $validatedData = $request->validated();

		if ($request->hasFile('image'))
		{
			Arr::pull($validatedData, 'image');

			$path = 'uploads/images/testimonials/';

			$image = new FileService;

			$image = $image->uploadFile($request->file('image'), $path);
		}
		Testimonial::create($validatedData + [

			'image' => $image ?? null,
		]);

        if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Testimonial added successfully !',
        	]);
        }

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully !');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit-request', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
		$validatedData = $request->validated();

		$oldImageName = $testimonial->image;

		if ($request->hasFile('image'))
		{
			Arr::pull($validatedData, 'image');

			$path = 'uploads/images/testimonials/';

			$image = new FileService;

			$image = $image->uploadFile($request->file('image'), $path);
		}

		if(isset($image))
		{
			$oldImageDelete = new FileService;

			$oldImageDelete = $oldImageDelete->deleteFile($oldImageName);
		}

		$testimonial->update($validatedData + [

			'image' => $image ?? $oldImageName,
		]);

        if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Testimonial added successfully !',
        	]);
        }

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully !');
	}

    public function destroy($testimonial)
    {
		$testimonialDeleted = Testimonial::destroy($testimonial);

		if(request()->ajax())
    	{
    		if ($testimonialDeleted)
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Testimonial moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Testimonial not found.'
    		]);
    	}

    	if ($testimonialDeleted)
    	{
    		return redirect()->route('testimonials.index')->with('success', 'Testimonial moved to trash !');
    	}

    	return redirect()->route('testimonials.index')->with('error', 'Sorry! Testimonial not found.');
	}

	public function restore($testimonial)
    {
    	$testimonial = Testimonial::onlyTrashed()->where('id', $testimonial)->firstOrFail();

    	if(request()->ajax())
    	{
    		if ($testimonial->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Testimonial Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Testimonial for restoration not found.'
    		]);
    	}

    	if ($testimonial->restore())
    	{
    		return redirect()->route('testimonials.index')->with('success', 'Testimonial Restored Successfully !');
    	}

    	return redirect()->route('testimonials.index')->with('error', 'Sorry! Testimonial for restoration not found');
	}

    public function forceDestroy($testimonial)
    {
    	$testimonial = Testimonial::onlyTrashed()->where('id', $testimonial)->firstOrFail();

    	$image = $testimonial->image;

    	if($image)
    	{
    		(new FileService)->deleteFile($image);
    	}

    	if(request()->ajax())
		{
			if ($testimonial->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Testimonial Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Testimonial not found.'
			]);
		}

		if ($testimonial->forceDelete())
		{
			return redirect()->route('testimonials.index')->with('success', 'Testimonial Deleted !');
		}

		return redirect()->route('testimonials.index')->with('error', 'Sorry! Testimonial not found.');
	}
}
