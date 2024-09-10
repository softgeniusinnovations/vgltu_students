<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index() {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function create() {
        return view('admin.photos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

        foreach ($request->file('photos') as $photoFile) {
            $path = $photoFile->store('photos', 'public');
            Photo::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'image_path' => $path,
            ]);
        }

        return redirect()->route('photos.index')->with('success', 'Photos uploaded successfully.');
    }

    public function edit(Photo $photo) {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo) {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

        $photo->update($request->only('title', 'short_description', 'description'));

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $photo->update(['image_path' => $path]);
        }

        return redirect()->route('photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Photo $photo) {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully.');
    }
}
