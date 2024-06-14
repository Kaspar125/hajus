<?php

namespace App\Http\Controllers;

use App\Models\Markers;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
     /**
     * Display a listing of the markers.
     */
    public function index()
    {
        $markers = Markers::all();

        return view('markers.index', compact('markers'));
    }

    /**
     * Show the form for creating a new marker.
     */
    public function create()
    {
        return view('markers.create');
    }

    /**
     * Store a newly created marker in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable',
        ]);
        try {
            Markers::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while creating the marker.');
        }

        return redirect()->route('markers.index')
            ->with('success', 'Marker deleted successfully');
    }

    /**
     * Show the form for editing the specified marker.
     */
    public function edit($id)
    {
        $marker = Markers::find($id);
        if ($marker) {
            return view('markers.edit', ['marker' => $marker]);
        } else {
            // Handle the case where the marker doesn't exist
            return redirect()->back()->withErrors('Marker not found.');
        }
    }

    /**
     * Update the specified marker in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $marker = Markers::find($id);
        if (!$marker) {
            return redirect()->back()->withErrors('Marker not found.');
        }

        $marker->update($validatedData);

        return redirect()->route('markers.index')
            ->with('success', 'Marker updated successfully');
    }

    /**
     * Remove the specified marker from storage.
     */
    public function destroy($id)
    {
        $marker = Markers::find($id);
        if ($marker) {
            $marker->delete();

            return redirect()->route('markers.index')
                ->with('success', 'Marker deleted successfully');
        } else {
            return redirect()->back()->withErrors('Marker not found.');
        }
    }
}
