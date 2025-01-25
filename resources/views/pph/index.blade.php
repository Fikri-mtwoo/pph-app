<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>PPh 21</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

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
      <img class="d-block mx-auto mb-4" src="{{ asset('assets/brand/lambang-djp.png') }}" alt="" width="200" >
      <h2>PPh 21 (TER)</h2>
      <p class="lead">Pajak Penghasilan (PPh) adalah pungutan wajib atas setiap penghasilan yang diterima oleh Wajib Pajak orang pribadi dan badan usaha. PPh Pasal 21 merupakan jenis pajak yang dipungut atas penghasilan karyawan dari pemberi kerja.</p>
    </div>

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Biodata Karyawan</h4>
        <form method="POST" action="{{route('pph.store')}}">
        @csrf
          <div class="row g-3">

            <div class="col-12">
              <label for="nama-karyawan" class="form-label">Nama Karyawan</label>
              <input type="text" name="nama_karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama-karyawan" placeholder="Nama Karyawan..." value="{{ old('nama_karyawan') }}">
                @error('nama_karyawan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                <option value="">Pilih...</option>
                <option value="bk">Belum Kawin</option>
                <option value="k">Kawin</option>
              </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
              <label for="tanggungan" class="form-label">Tanggungan</label>
              <select class="form-select @error('tanggungan') is-invalid @enderror" id="tanggungan" name="tanggungan">
                <option value="">Pilih...</option>
                <option value="0">Tidak Ada</option>
                <option value="1">1 Anak</option>
                <option value="2">2 Anak</option>
                <option value="3">3 Anak</option>
              </select>
                @error('tanggungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <h4 class="mb-3">Penghasilan Karyawan</h4>

            <div class="col-6">
              <label for="gaji-pokok" class="form-label">Gaji Pokok</label>
              <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" id="gaji-pokok" placeholder="Rp 1000000...">
                @error('gaji_pokok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-6">
              <label for="tunjangan-makan" class="form-label">Tunjangan Makan</label>
              <input type="number" class="form-control @error('tun_makan') is-invalid @enderror" name="tun_makan" id="tunjangan-makan" placeholder="Rp 1000000...">
                @error('tun_makan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-6">
              <label for="tunjangan-transport" class="form-label">Tunjangan Transport</label>
              <input type="number" class="form-control @error('tun_transport') is-invalid @enderror" name="tun_transport" id="tunjangan-transport" placeholder="Rp 1000000...">
                @error('tun_transport')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-6">
              <label for="tunjangan-transport" class="form-label">Tunjangan Jabatan</label>
              <input type="number" class="form-control @error('tun_jabatan') is-invalid @enderror" name="tun_jabatan" id="tunjangan-transport" placeholder="Rp 1000000...">
                @error('tun_jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
              <label for="tunjangan-kesehatan" class="form-label">Tunjangan Kesehatan</label>
              <input type="number" class="form-control @error('tun_kesehatan') is-invalid @enderror" name="tun_kesehatan" id="tunjangan-kesehatan" placeholder="Rp 1000000...">
                @error('tun_kesehatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <h4 class="mb-3">Pengeluaran Karyawan</h4>

            <div class="col-12">
              <label for="biaya-jabatan" class="form-label">Biaya Jabatan</label>
              <input type="number" class="form-control @error('biaya_jabatan') is-invalid @enderror" name="biaya_jabatan" id="biaya-jabatan" placeholder="Rp 1000000...">
                @error('biaya_jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
              <label for="biaya-pensiun" class="form-label">Biaya Pensiun</label>
              <input type="number" class="form-control @error('biaya_pensiun') is-invalid @enderror" name="biaya_pensiun" id="biaya-pensiun" placeholder="Rp 1000000...">
                @error('biaya_pensiun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Kirim</button>
        </form>
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
