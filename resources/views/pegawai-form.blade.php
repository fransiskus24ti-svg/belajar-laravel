<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4 text-center">Input Data Pegawai</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/pegawai') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
            </div>

            <div class="mb-3">
                <label for="current_semester" class="form-label">Semester Saat Ini</label>
                <input type="number" name="current_semester" class="form-control" value="{{ old('current_semester') }}">
            </div>

            <div class="mb-3">
                <label for="future_goal" class="form-label">Cita-cita</label>
                <input type="text" name="future_goal" class="form-control" value="{{ old('future_goal') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
    </div>
</div>
</body>
</html>
