<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adoptions = Adoption::with(['user', 'pet'])->orderBy('id', 'desc')->paginate(12);
        return view('adoptions.index')->with('adoptions', $adoptions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::where('active', 1)->where('adopted', 0)->get();
        return view('adoptions.create')->with('pets', $pets);
    }

    /**
     * Display the current user adoptions.
     */
    public function my()
    {
        $adoptions = Adoption::with('pet')->where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(12);
        return view('adoptions.my')->with('adoptions', $adoptions);
    }

    /**
     * Show the make adoption page.
     */
    public function make()
    {
        $pets = Pet::where('active', 1)->where('adopted', 0)->get();
        return view('adoptions.make')->with('pets', $pets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        //
    }
}