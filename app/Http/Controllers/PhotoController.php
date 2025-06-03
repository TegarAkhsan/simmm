<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::where('user_id', Auth::id())->latest()->get();
        return view('photos.index', compact('photos'));
    }

    public function preview(Photo $photo)
    {
        $this->authorize('view', $photo);
        return view('photos.preview', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        $this->authorize('update', $photo);
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|image|max:2048',
        ]);

        $photo->title = $request->title;
        $photo->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('photos', 'public');
            $photo->file_path = $path;
        }

        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function print(Photo $photo)
    {
        $this->authorize('view', $photo);
        // Bisa menggunakan view khusus untuk print atau generate PDF, di sini contoh sederhana:
        return view('photos.print', compact('photo'));
    }

    public function download(Photo $photo)
    {
        $this->authorize('view', $photo);
        $path = storage_path('app/public/' . $photo->file_path);
        if (file_exists($path)) {
            return response()->download($path);
        }
        abort(404);
    }
}
