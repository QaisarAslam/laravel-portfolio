<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Services\FileService;
use Illuminate\Support\Arr;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$clients = Client::withTrashed()->orderBy('id', 'desc')->get();

		return view('admin.clients.index', compact('clients'));
	}

	public function table()
	{
		$clients = Client::withTrashed()->orderBy('id', 'desc')->get();

		return view('admin.clients.table', compact('clients'));
	}

	public function create()
	{
		return view('admin.clients.create');
	}

	public function store(ClientRequest $request)
	{
		$validatedData = $request->validated();

		if ($request->hasFile('logo')) {

			Arr::pull($validatedData, 'logo');

			$logoPath = 'uploads/images/clients/logos/';

			$logo = new FileService;

			$logo = $logo->uploadFile($request->file('logo'), $logoPath);
		}

		Client::create($validatedData + [

			'logo' => $logo ?? null,
		]);

        if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Client added successfully !',
        	]);
        }

        return redirect()->route('clients.index')->with('success', 'Client added successfully !');
	}

	public function edit(Client $client)
	{
		return view('admin.clients.edit-request', compact('client'));
	}

	public function update(ClientRequest $request, Client $client)
	{
		$validatedData = $request->validated();

		$oldLogo = $client->logo;

		if ($request->hasFile('logo')) {

			Arr::pull($validatedData, 'logo');

			$logoPath = 'uploads/images/clients/logos/';

			$logo = new FileService;

			$logo = $logo->uploadFile($request->file('logo'), $logoPath);
		}

		$client->update($validatedData + [

			'logo' => $logo ?? $oldLogo,
		]);

		if (isset($logo)) {

			$deleteFile = new FileService;

			$deleteLogo = $deleteFile->deleteFile($oldLogo);
		}

		if($request->ajax())
		{
			return response()->json([
				'type' => 'success',
				'msg' => 'Client updated successfully !',
			]);
		}

		return redirect()->route('clients.index')->with('success', 'Client updated successfully !');
	}

	public function destroy(Client $client)
	{
		$clientDeleted = Client::destroy($client->id);

		if(request()->ajax())
    	{
    		if ($clientDeleted)
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Client moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Client not found.'
    		]);
    	}

    	if ($clientDeleted)
    	{
    		return redirect()->route('clients.index')->with('success', 'Client moved to trash !');
    	}

    	return redirect()->route('clients.index')->with('error', 'Sorry! Client not found.');
	}

	public function restore($client)
	{
		$client = Client::onlyTrashed()->where('id', $client)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($client->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Client Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Client for restoration not found.'
    		]);
    	}

    	if ($client->restore())
    	{
    		return redirect()->route('clients.index')->with('success', 'Client Restored Successfully !');
    	}

    	return redirect()->route('clients.index')->with('error', 'Sorry! Client for restoration not found');
	}

	public function forceDestroy($client)
	{
		$client = Client::onlyTrashed()->where('id', $client)->firstOrFail();

		$clientLogo = $client->logo;

		if($clientLogo)
		{
			$deleteClientLogo = new FileService;

			$deleteClientLogo->deleteFile($clientLogo);
		}

		if(request()->ajax())
		{
			if ($client->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Client Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Client not found.'
			]);
		}

		if ($client->forceDelete())
		{
			return redirect()->route('clients.index')->with('success', 'Client Deleted !');
		}

		return redirect()->route('clients.index')->with('error', 'Sorry! Client not found.');
	}
}
