<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #pelanggan {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            margin-left: auto;
            margin-right: auto;
            text-transform: capitalize;
            border-collapse: collapse;
            width: 100%;
        }

        #pelanggan td, #pelanggan th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pelanggan tr:nth-child(even){background-color: #f2f2f2;}

        #pelanggan th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <div style="text-align: center;">
            <h3>DAFTAR PELANGGAN PENERIMA LISTRIK SUBSIDI & NON SUBSIDI</h3>
            <h5>PLN UNIT LAYANAN PELANGGAN KEBUMEN</h5>
            <p style="font-size: 11px;">Jl. Tentara Pelajar No.19, Panggel, Panjer, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah 54312</p>
            <p style="font-size: 11px;">Diambil pada tanggal {{ date('d-m-Y') }}.</p>
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
        </table>
    </div>
</body>

</html>
