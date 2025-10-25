<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function index()
    {
        // Data dasar
        $name = "Muzian Qashmal";
        $tanggal_lahir = Carbon::create(2006, 7, 5); // contoh tanggal lahir
        $tgl_harus_wisuda = Carbon::create(2026, 6, 30); // contoh tanggal wisuda
        $current_semester = 4;
        $future_goal = "Menjadi Software Engineer profesional";

        // Hitung umur
        $my_age = $tanggal_lahir->age;

        // Array hobi
        $hobbies = [
            "Ngoding",
            "Mendengarkan musik",
            "Bermain futsal",
            "Menonton film",
            "Membaca buku"
        ];

        // Hitung sisa waktu menuju wisuda
        $time_to_study_left = Carbon::now()->diffInDays($tgl_harus_wisuda);

        // Tentukan pesan berdasarkan semester
        if ($current_semester < 3) {
            $motivasi = "Masih Awal, Kejar TAK!";
        } else {
            $motivasi = "Jangan main-main, kurang-kurangi main game!";
        }

        // Passing data ke view
        $data = [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda->toFormattedDateString(),
            'time_to_study_left' => $time_to_study_left . ' hari lagi menuju wisuda',
            'current_semester' => $current_semester,
            'motivasi' => $motivasi,
            'future_goal' => $future_goal
        ];

        return view('index', $data);
    }
}
