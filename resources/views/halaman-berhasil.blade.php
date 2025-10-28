<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-success">✅ {{ $pesan }}</h3>
                    <p>Username: <strong>{{ $username }}</strong></p>
                    <a href="{{ url('/auth') }}" class="btn btn-secondary mt-3">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
