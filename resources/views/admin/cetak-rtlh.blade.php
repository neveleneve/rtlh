<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_the_Ministry_of_Public_Works_and_Housing_of_the_Republic_of_Indonesia.svg">
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_the_Ministry_of_Public_Works_and_Housing_of_the_Republic_of_Indonesia.svg">
    <title>Cetak Data Penerima RTLH</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ route('css', ['filename'=>'nucleo-icons.css']) }}" rel="stylesheet">
    <link href="{{ route('css', ['filename'=>'nucleo-svg.css']) }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ route('css', ['filename'=>'argon-dashboard.css?v=2.0.0']) }}" rel="stylesheet">
</head>

<body>
    <h3 class="text-center text-dark">Daftar Penerima RTLH</h3>
    <table class="table text-center">
        <thead class="bg-dark text-light" style="font-size : 17px;">
            <tr>
                <th>No</th>
                <th>Nomor Kartu Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>Alamat</th>
                <th>Hasil Penilaian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="font-size : 17px;">
            @forelse ($data as $item)
            <tr class="border-bottom">
                <td class="border-start">{{ $loop->index+1 }}</td>
                <td>{{ $item->no_kk }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->nilai_wp }}</td>
                <td class="border-end">{{ $loop->index < 50 ?  'Lolos' : 'Tidak Lolos' }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
    
    <script src="{{ route('script', ['filename'=>'core|popper.min.js']) }}"></script>
    <script src="{{ route('script', ['filename'=>'core|bootstrap.min.js']) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.8/dist/index.bundle.min.js"></script>
    <script src="{{ route('script', ['filename'=>'plugins|perfect-scrollbar.min.js']) }}"></script>
    <script src="{{ route('script', ['filename'=>'plugins|smooth-scrollbar.min.js']) }}"></script>
    <script src="{{ route('script', ['filename'=>'plugins|chartjs.min.js']) }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>