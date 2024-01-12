
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Gedung</title>
</head>

<body>
    <div class="container">
        <h1>Detail Gedung</h1>
        @foreach ($gedungDetails as $gedungDetail)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $gedungDetail->nama }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $gedungDetail->deskripsi }}</p>

                    <h3>Layanan:</h3>
                    {{-- <ul>
                        @foreach (explode(',', $gedungDetail->layanan) as $layanan)
                            <li>{{ trim($layanan) }}</li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
