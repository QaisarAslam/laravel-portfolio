<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Services\FileService;

class ServiceController extends Controller
{
	public function index()
	{
		$services = Service::withTrashed()->orderBy('id', 'desc')->get();

		return view('admin.services.index', compact('services'));
	}


	public function table()
	{
		$services = Service::withTrashed()->orderByDesc('id')->get();

		return view('admin.services.table', compact('services'));
	}

	public function create()
	{
		return view('admin.services.create');
	}

	public function store(ServiceRequest $request)
	{
		$validatedData = $request->validated();

		if(Arr::has($validatedData, 'image'))
		{
			Arr::pull($validatedData, 'image');

			$imagePath = '/uploads/images/services/';

			$image = new FileService;

			$image = $image->uploadFile($request->file('image'), $imagePath);
		}

		Service::create($validatedData + [

			'image' => $image ?? null,

		]);

		if($request->ajax())
		{
			return response()->json([
				'type' => 'success',
				'msg' => 'Service Added Successfully !']);
		}

		return redirect()->route('services.index')->with('msg', 'Service Added Successfully !');
	}

	public function edit(Service $service)
	{
		return view('admin.services.edit-request', compact('service'));
	}

	public function update(ServiceRequest $request, Service $service)
	{
		$validatedData = $request->validated();

		$oldImage = $service->image;

		if($request->hasFile('image'))
		{
			Arr::pull($validatedData, 'image');

			$path = '/uploads/images/services/';

			$image = new FileService;

			$image = $image->uploadFile($request->file('image'), $path);
		}

		if(isset($image))
		{
			$deleteImage = new FileService;

			$deleteImage = $deleteImage->deleteFile($oldImage);
		}

		$service->update($validatedData + [
			'image' => $image ?? $oldImage
		]);

		if($request->ajax())
		{
			return response()->json([
				'type' => 'success',
				'msg' => 'Service Updated Successfully !']);
		}

		return redirect()->route('services.index')->with('success', 'Service Updated Successfully !');
	}

	public function destroy($service)
	{
		$serviceDeleted = Service::destroy($service);

		if(request()->ajax())
    	{
    		if ($serviceDeleted)
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Service moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Service not found.'
    		]);
    	}
    	if ($serviceDeleted)
    	{
    		return redirect()->route('services.index')->with('success', 'Service moved to trash !');
    	}

    	return redirect()->route('services.index')->with('error', 'Sorry! Service not found.');
	}

	public function restore($service)
	{
		$service = Service::onlyTrashed()->where('id', $service)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($service->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Service Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Service for restoration not found.'
    		]);
    	}

    	if ($service->restore())
    	{
    		return redirect()->route('services.index')->with('success', 'Service Restored Successfully !');
    	}

    	return redirect()->route('services.index')->with('error', 'Sorry! Service for restoration not found');
	}

	public function forceDestroy($service)
	{
		$service = Service::onlyTrashed()->where('id', $service)->firstOrFail();

		$serviceImage = $service->image;

		if($serviceImage)
		{
			$deleteServiceImage = new FileService;

			$deleteServiceImage->deleteFile($serviceImage);
		}

		if(request()->ajax())
		{
			if ($service->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Service Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Service not found.'
			]);
		}

		if ($service->forceDelete())
		{
			return redirect()->route('services.index')->with('success', 'Service Deleted !');
		}

		return redirect()->route('services.index')->with('error', 'Sorry! Service not found.');
	}
}
