<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.0.0-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
    <div class="container-fluid py-5" style="margin-top: 10%">
        <div class="container text-center ">
            <div class="card">
                <h1 class="mt-5">Halaman Tidak Ditemukan</h1>
                <p class="mb-4">Maaf, Halaman Yang Anda Cari Tidak Dapat Ditemukan.</p>
                <div class="text-center">
                    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Kembali ke Halaman Utama</a>
                </div>
            </div>    
        </div>
    </div>

    <!-- Sertakan Bootstrap 5 JS (jika diperlukan) -->
    <script src="{{ asset('css/bootstrap-5.0.0-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

