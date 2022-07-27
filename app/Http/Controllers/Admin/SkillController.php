<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Services\FileService;

class SkillController extends Controller
{
	public function index()
	{
		$skills = Skill::withTrashed()->orderBy('id', 'desc')->get();

		return view('admin.skills.index', compact('skills'));
	}

	public function table()
	{
		$skills = Skill::withTrashed()->orderByDesc('id')->get();

		return view('admin.skills.table', compact('skills'));
	}

	public function create()
	{
		return view('admin.skills.create');
	}

	public function store(SkillRequest $request)
	{
		$validatedData = $request->validated();

		if(Arr::has($validatedData, 'logo'))
		{
			Arr::pull($validatedData, 'logo');

			$logoPath = '/uploads/images/services/';

			$logo = new FileService;

			$logo = $logo->uploadFile($request->file('logo'), $logoPath);
		}

		Skill::create($validatedData + [

			'logo' => $logo ?? null,

		]);

		if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Skill added successfully !',
        	]);
        }

        return redirect()->route('skills.index')->with('success', 'Category added successfully !');

	}

	public function edit(Skill $skill)
	{

		return view('admin.skills.edit-request', compact('skill'));
	}

	public function update(SkillRequest $request, Skill $skill)
	{
		$validatedData = $request->validated();

		$oldLogo = $skill->logo;

		if($request->hasFile('logo'))
		{
			Arr::pull($validatedData, 'logo');

			$path = '/uploads/images/skills/';

			$logo = new FileService;

			$logo = $logo->uploadFile($request->file('logo'), $path);
		}

		if(isset($logo))
		{
			$deletedLogo = (new FileService)->deleteFile($oldLogo);
		}

		$updated = $skill->update($validatedData + [
			'logo' => $logo ?? $oldLogo
		]);

		if($request->ajax())
        {
        	return response()->json([
        		'type' => 'success',
        		'msg' => 'Skill updated successfully !',
        	]);
        }

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully !');
	}

	public function destroy($skill)
	{
		$skillDeleted = Skill::destroy($skill);

		if(request()->ajax())
    	{
    		if ($skillDeleted)
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Skill moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Skill not found.'
    		]);
    	}

    	if ($skillDeleted)
    	{
    		return redirect()->route('skills.index')->with('success', 'Skill moved to trash !');
    	}

    	return redirect()->route('skills.index')->with('error', 'Sorry! Skill not found.');
	}

	public function restore($skill)
	{
		$skill = Skill::onlyTrashed()->where('id', $skill)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($skill->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Skill Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Skill for restoration not found.'
    		]);
    	}

    	if ($skill->restore())
    	{
    		return redirect()->route('skills.index')->with('success', 'Skill Restored Successfully !');
    	}

    	return redirect()->route('skills.index')->with('error', 'Sorry! Skill for restoration not found');
	}

	public function forceDestroy($skill)
	{
		$skill = Skill::onlyTrashed()->where('id', $skill)->firstOrFail();

		$skillLogo = $skill->logo;

		if($skillLogo)
		{
			$deleteSkillLogo = new FileService;

			$deleteSkillLogo->deleteFile($skillLogo);
		}

		if(request()->ajax())
		{
			if ($skill->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Skill Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Skill not found.'
			]);
		}

		if ($skill->forceDelete())
		{
			return redirect()->route('skills.index')->with('success', 'Skill Deleted !');
		}

		return redirect()->route('skills.index')->with('error', 'Sorry! Skill not found.');
	}
}
