<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Services\FileService;

class ProfileController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (Auth::user()->profile != null)
		{
			return redirect()->route('profiles.show', Auth::user()->profile->id);
		}
		return view('admin.profiles.index');
	}

	public function show($id)
	{
		$profile = Profile::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

		return view('admin.profiles.show', compact('profile'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (Auth::user()->profile != null)
		{
			return redirect()->route('profiles.show', Auth::user()->profile->id);
		}
		return view('admin.profiles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProfileRequest $request)
	{
		$validatedData = $request->validated();

		if ($request->hasFile('avatar'))
		{
			Arr::pull($validatedData, 'avatar');

			$avatarPath = 'uploads/images/users/avatars/';

			$avatar = new FileService;

			$avatar = $avatar->uploadFile($request->file('avatar'), $avatarPath);
		}

		if ($request->hasFile('doc'))
		{
			Arr::pull($validatedData, 'doc');

			$docPath = 'uploads/docs/users/';

			$doc = new FileService;

			$doc = $doc->uploadFile($request->file('doc'), $docPath);
		}

		$profile = Profile::create($validatedData + [

			'avatar' => $avatar ?? null,

			'doc' => $doc ?? null
		]);

		return redirect()->route('profiles.show', $profile->id)->with('success', 'Profile created successfully!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Profile  $profile
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$profile = Profile::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

		return view('admin.profiles.edit', compact('profile'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Profile  $profile
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProfileRequest $request, $id)
	{
		$profile = Profile::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

		$validatedData = $request->validated();

		$oldAvatar = $profile->avatar;

		Arr::pull($validatedData, 'doc');

		if ($request->hasFile('avatar'))
		{
			Arr::pull($validatedData, 'avatar');

			$avatarPath = 'uploads/images/users/avatars/';

			$avatar = new FileService;

			$avatar = $avatar->uploadFile($request->file('avatar'), $avatarPath);
		}

		if ($request->hasFile('doc'))
		{
			$oldDoc = $profile->doc;

			$docPath = 'uploads/docs/users/';

			$doc = new FileService;

			$doc = $doc->uploadFile($request->file('doc'), $docPath);
		}

		$profile->update($validatedData + [

			'avatar' => $avatar ?? $oldAvatar,

			'doc' => $doc ?? $oldDoc,
		]);

		$deleteFile = new FileService;

		if (isset($avatar))
		{
			$deleteAvatar = $deleteFile->deleteFile($oldAvatar);
		}

		if (isset($doc))
		{
			$deleteDoc = $deleteFile->deleteFile($oldDoc);
		}

		return redirect()->route('profiles.show', $profile->id)->with('success', 'Profile updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Profile  $profile
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$profile = Profile::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

		$avatar = $profile->avatar;

		$doc = $profile->doc;

		$profile->delete();

		$deleteFile = new FileService;

		$deleteAvatar = $deleteFile->deleteFile($avatar);

		$deleteDoc = $deleteFile->deleteFile($doc);

		return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully');
	}
}
