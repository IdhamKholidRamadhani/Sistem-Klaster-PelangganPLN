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
            <h5>DINAS SOSIAL PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK</h5>
            <p style="font-size: 11px;">Jl. Soekarno-Hatta No.153, Kebumen, Bumirejo, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah 54311</p>
            <p style="font-size: 11px;">Diambil pada tanggal {{ date('d-m-Y') }}.</p>
        </div>
        <hr style="double">
        <table id="pelanggan">
            <tr>
            <th>#</th>
            <th>ID Pel</th>
            <th>Nama</th>
            <th>Tarif</th>
            <th>Daya</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>Tgg</th>
            <th>SKTM</th>
            <th>Kategori</th>
            </tr>

            @if (!request()->desa)
                <td colspan="11" style="text-align:center;">Tidak Ada Data Yang Dipilih</td>
            @endif
            @php $i=1 @endphp
            @foreach ($data as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->no_pelanggan_result }}</td>
                    <td>{{ $d->nama_pelanggan_result }}</td>
                    <td style="width:40px;">{{ $d->tarif_pelanggan_result }}</td>
                    <td>{{ $d->daya_pelanggan_result }}</td>
                    <td>{{ $d->alamat_pelanggan_result }}</td>
                    <td>{{ $d->pekerjaan_pelanggan_result }}</td>
                    <td style="width:80px;">@currency($d->penghasilan_pelanggan_result)</td>
                    <td>{{ $d->tanggungan_pelanggan_result }}</td>
                    <td>{{ $d->sktm_pelanggan_result }}</td>
                    <td>{{ $d->kategori_result }}</td>
                </tr>
<<<<<<< HEAD
=======
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
                        <td>{{ $d->pekerjaan_pelanggan_result }}</td>
                        {{-- <td>{{ $d->penghasilan_pelanggan_result }}</td> --}}
                        <td>@currency($d->penghasilan_pelanggan_result)</td>
                        <td>{{ $d->tanggungan_pelanggan_result }}</td>
                        <td>{{ $d->sktm_pelanggan_result }}</td>
                        <td>{{ $d->kategori_result }}</td>
                    </tr>
>>>>>>> 4fb3762dcee1c01cb5b54c9c32c2ea4e50a6a8f8
                @endforeach
        </table>
    </div>
</body>

</html>
