<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Hasil Data Pegawai</h3>

        <p><strong>Nama:</strong> {{ $name }}</p>
        <p><strong>Umur:</strong> {{ $my_age }} tahun</p>

        <p><strong>Hobi:</strong></p>
        <ul>
            @foreach($hobbies as $hobi)
                <li>{{ $hobi }}</li>
            @endforeach
        </ul>

        <p><strong>Tanggal Harus Wisuda:</strong> {{ $tgl_harus_wisuda }}</p>
        <p><strong>Waktu Tersisa untuk Wisuda:</strong> {{ $time_to_study_left }}</p>
        <p><strong>Semester Saat Ini:</strong> {{ $current_semester }}</p>
        <p><strong>Motivasi:</strong> {{ $motivasi }}</p>
        <p><strong>Cita-cita:</strong> {{ $future_goal }}</p>

        <a href="{{ url('/pegawai') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
</body>
</html>
