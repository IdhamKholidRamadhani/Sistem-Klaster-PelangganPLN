<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row align-items-start text-center mt-2">
            <div class="col">
                <h4 class="font-weight-bold">DAFTAR PELANGGAN PENERIMA LISTRIK SUBSIDI & NON SUBSIDI</h4>
                <h6 class="font-weight-bold">PLN UNIT LAYANAN PELANGGAN KEBUMEN</h6>
                <p>Jl. Tentara Pelajar No.19, Panggel, Panjer, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54312</p>
                <p>Diambil pada tanggal {{ date('d-m-Y') }}.</p>
            </div>
        </div>
        <hr style="border-top: 4px double" class="mb-2">
        <table class="table table-bordered">
            <thead style="background: #f2f2f2">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Pel</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Daya</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kategori</th>
                </tr>
            </thead>
            <tbody class="text-capitalize">
                @if (!request()->desa)
                    <td colspan="11" class="text-center">Tidak Ada Data Yang Dipilih</td>
                @endif
                @php $i=1 @endphp
                @foreach ($data as $d)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $d->no_pelanggan_result }}</td>
                        <td width="60px">{{ $d->nama_pelanggan_result }}</td>
                        <td>{{ $d->tarif_pelanggan_result }}</td>
                        <td>{{ $d->daya_pelanggan_result }}</td>
                        <td>{{ $d->alamat_pelanggan_result }}</td>
                        <td>{{ $d->kategori_result }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
