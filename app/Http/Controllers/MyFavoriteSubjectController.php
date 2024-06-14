<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFavoriteSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $limit = $request->input('limit', 10);
    $subjects = Cache::remember('my_favorite_subjects', 60, function () use ($limit) {
        return MyFavoriteSubject::limit($limit)->get();
    });
    return response()->json($subjects);
}

public function show($id)
{
    $subject = Cache::remember('my_favorite_subject_' . $id, 60, function () use ($id) {
        return MyFavoriteSubject::find($id);
    });
    return response()->json($subject);
}

public function store(Request $request)
{
    $subject = MyFavoriteSubject::create($request->all());
    return response()->json($subject);
}

public function update(Request $request, $id)
{
    $subject = MyFavoriteSubject::find($id);
    $subject->update($request->all());
    return response()->json($subject);
}

public function destroy($id)
{
    $subject = MyFavoriteSubject::find($id);
    $subject->delete();
    return response()->json(null);
}

}
