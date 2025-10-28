<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function form()
    {
        return view('pegawai-form');
    }

    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required|date',
            'current_semester' => 'required|integer|min:1',
            'future_goal' => 'required',
        ]);
        $name = $request->input('name');
        $tanggal_lahir = Carbon::parse($request->input('tanggal_lahir'));
        $umur = $tanggal_lahir->age;

        $hobbies = [
            'Membaca', 'Bermain Gitar', 'Berenang', 'Coding', 'Fotografi'
        ];

        $tgl_harus_wisuda = Carbon::createFromFormat('Y-m-d', '2026-08-01');
        $time_to_study_left = now()->diffInDays($tgl_harus_wisuda, false);

        $current_semester = $request->input('current_semester');
        $future_goal = $request->input('future_goal');

        $motivasi = $current_semester < 3
            ? "Masih Awal, Kejar TAK"
            : "Jangan main-main, kurang-kurangi main game!";

        return view('pegawai-index', [
            'name' => $name,
            'my_age' => $umur,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda->toFormattedDateString(),
            'time_to_study_left' => $time_to_study_left . ' hari',
            'current_semester' => $current_semester,
            'motivasi' => $motivasi,
            'future_goal' => $future_goal,
        ]);
    }
}
