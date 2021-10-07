<?php

namespace App\Http\Controllers;

use App\Profile;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:profile-list|profile-create|profile-edit|profile-delete', ['only' => ['index','show']]);
        $this->middleware('permission:profile-create', ['only' => ['create','store']]);
        $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:profile-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate(5);
        return view('profiles.index',compact('profiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')
            ->with('success','Profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function show(Profile $profile)
    {
        return view('profiles.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Profile $profile
     * @return RedirectResponse
     */
    public function update(Request $request, Profile $profile): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.index')
            ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Profile $profile
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Profile $profile): RedirectResponse
    {
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('success','Profile deleted successfully');
    }
}
