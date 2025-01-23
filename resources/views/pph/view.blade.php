<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>PPh 21</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/assets/custom/checkout/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="/assets/brand/lambang-djp.png" alt="" width="200" >
                <h2>PPh 21 (TER)</h2>
                <p class="lead">Pajak Penghasilan (PPh) adalah pungutan wajib atas setiap penghasilan yang diterima oleh Wajib Pajak orang pribadi dan badan usaha. PPh Pasal 21 merupakan jenis pajak yang dipungut atas penghasilan karyawan dari pemberi kerja.</p>
            </div>

            <div class="row g-5 justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <a href="{{route('pph.index')}}" class="btn btn-outline-primary mb-3 btn-sm">Kembali</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <td colspan="2" class="table-info">Nama Karyawan : {{$nama}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-info">Status : {{$status}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-info">Tanggungan : {{$tanggungan}}</td>
                            </tr>
                            <tr class="table-primary">
                                <th scope="col">Keterangan</th>
                                <th scope="col">Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="table-secondary">Penghasilan :</td>
                            </tr>
                            <tr>
                                <td>Gaji Pokok</td>
                                <td>Rp. {{number_format($gaji_pokok, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Tunjangan Makan</td>
                                <td>Rp. {{number_format($tun_makan, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Tunjangan Transport</td>
                                <td>Rp. {{number_format($tun_transport, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Tunjangan Jabatan</td>
                                <td>Rp. {{number_format($tun_jabatan, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Tunjangan Kesehatan</td>
                                <td>Rp. {{number_format($tun_kesehatan, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Penghasila Bruto (1 tahun)</td>
                                <td>Rp. {{number_format($bruto, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-secondary">Pengeluaran :</td>
                            </tr>
                            <tr>
                                <td>Biaya Jabatan</td>
                                <td>Rp. {{number_format($biaya_jabatan, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Biaya Pensiun</td>
                                <td>Rp. {{number_format($biaya_pensiun, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Penghasila Netto (1 tahun)</td>
                                <td>Rp. {{number_format($netto, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan Tidak Kena Pajak (1 tahun)</td>
                                <td>Rp. {{number_format($ptkp, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan Kena Pajak (1 tahun)</td>
                                <td>Rp. {{number_format($pkp, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-secondary">Pajak Terhutang :</td>
                            </tr>
                            @for ($i = 0; $i < count($pajak); $i++)
                                <tr>
                                    <td>{{$pajak[$i]['persen']}}%</td>
                                    <td>Rp. {{number_format($pajak[$i]['pajak'], 0, '.', '.')}}</td>
                                </tr>
                            @endfor
                            <tr>
                                <td>Total Pajak Terhutang (1 tahun)</td>
                                <td>Rp. {{number_format($total, 0, '.', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Total Pajak Terhutang (1 Bulan)</td>
                                <td>Rp. {{number_format($total / 12, 0, '.', '.')}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="fw-light fs-6 text-center">Berdasarkan perhitungan diatas besar pajak yang memperoleh insentif adalah hanya sebesar penghasilan yang teratur, yaitu sebesar <span class="fw-bold">Rp. {{number_format($total / 12, 0, '.', '.')}}</span></p>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2025 Perhitangan PPh 21 (TER)</p>
            <!-- <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul> -->
        </footer>
    </div>


    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/custom/checkout/form-validation.js"></script>
</body>

</html>