<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    // Show the form for creating a new video
    public function create()
    {
        return view('admin.videos.create');
    }

    // Store a newly created video in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:2000000',  // Video type and size validation
        ]);

        // Handle video file upload
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        // Save video details to the database
        Video::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video uploaded successfully.');
    }

    // Show the form for editing the specified video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    // Update the specified video in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:2000000',  // Optional video update
        ]);

        $video = Video::findOrFail($id);

        // Handle video file upload
        if ($request->hasFile('video')) {
            // Delete the old video
            Storage::disk('public')->delete($video->video_path);

            // Store the new video
            $videoPath = $request->file('video')->store('videos', 'public');
            $video->video_path = $videoPath;
        }

        // Update video details in the database
        $video->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video updated successfully.');
    }

    // Remove the specified video from storage
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Delete the video file from storage
        Storage::disk('public')->delete($video->video_path);

        // Delete video record from the database
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
    }
}
