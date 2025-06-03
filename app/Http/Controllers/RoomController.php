<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Tampilkan list ruangan
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // Tampilkan form buat ruangan baru
    public function create()
    {
        return view('rooms.create');
    }

    // Simpan data ruangan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rooms,name',
            'description' => 'nullable|string',
        ]);

        Room::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    // Tampilkan form edit ruangan
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // Update data ruangan
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rooms,name,' . $room->id,
            'description' => 'nullable|string',
        ]);

        $room->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil diupdate.');
    }

    // Hapus ruangan
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil dihapus.');
    }
}
