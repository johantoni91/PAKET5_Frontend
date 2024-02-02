<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>OTENTIK | ERROR 404</title>
    <style>
        .center {
            text-align: center
        }

        #space-invaders {
            margin: 0 auto;
            display: block;
            background: white;
            border-radius: 10px;
        }
    </style>
</head>

<body class="container px-5 pt-1" style="background-color: #EEF0FC;">
    <div class="card text-center shadow overflow-auto">
        <div class="card-header" style="border: none; background-color: rgb(15 23 42 / 1)">
            <img src="{{ asset('assets/images/kejaksaan-logo.png') }}" alt="" class="img-fluid rounded-full"
                width="120" height="120">
        </div>
        <div class="card-body">
            <h5 class="card-title">Halaman terinvasi oleh makhluk asing.</h5>
            <p class="card-text">Gunakan <span class="label label-danger">Spasi</span> untuk tembak dan (<span
                    class="label label-danger">←</span>&#160;<span class="label label-danger">→</span>) Untuk jalan
                !&#160;&#160;&#160;</p>
            <canvas id="space-invaders" />
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row gap-3 justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                    <path fill-rule="evenodd"
                        d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg> Dashboard</a>
            <button class="btn btn-outline-dark" id="restart">Ulangi</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/error.js') }}"></script>
</body>

</html>
