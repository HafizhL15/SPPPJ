@extends('layouts.front')
@section('title','Kuesioner')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container fw-bold">
      <h2 class="text-light text-center mb-3">Beri Kami Pandangan Anda! </h2>
      <h2 class="text-light text-center mb-3">Isilah Kuesioner Guna Membantu Kami Meningkatkan Layanan</h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-2 fw-bold">Form Kuesioner</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ url('kuesioner') }}" >
                            @csrf
                            <div class="row mb-3">
                                <h5 class="col-sm-2 fw-bold">Nama</h5>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control " name="nama" required>
                                </div>
                            </div><br>
                            <h5 class="fw-bold mb-3">1. Bagaimana Pendapat Anda Tentang Layanan Kami Secara Keseluruhan?</h5>
                            <div class="question fw-bold">
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_1" value="Sangat Memuaskan" required> Sangat Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_1" value="Memuaskan" required> Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_1" value="Cukup" required> Cukup
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_1" value="Kurang Memuaskan" required> Kurang Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_1" value="Sangat Tidak Memuaskan" required> Sangat Tidak Memuaskan
                                </label>
                            </div> <br><br>
                            
                            <h5 class="fw-bold mb-3">2. Bagaimana Pengalaman Anda Dengan Proses Pemesanan dan Pengiriman Produk?</h5>
                            <div class="question fw-bold">
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_2" value="Sangat Memuaskan" required> Sangat Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_2" value="Memuaskan" required> Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_2" value="Cukup" required> Cukup
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_2" value="Kurang Memuaskan" required> Kurang Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_2" value="Sangat Tidak Memuaskan" required> Sangat Tidak Memuaskan
                                </label>
                            </div> <br><br>

                            <h5 class="fw-bold mb-3">3. Sejauh Mana Anda Puas Dengan Layanan Service Kami?</h5>
                            <div class="question fw-bold">
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_3" value="Sangat Memuaskan" required> Sangat Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_3" value="Memuaskan" required> Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_3" value="Cukup" required> Cukup
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_3" value="Kurang Memuaskan" required> Kurang Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_3" value="Sangat Tidak Memuaskan" required> Sangat Tidak Memuaskan
                                </label>
                            </div> <br><br>

                            <h5 class="fw-bold mb-3">4. Bagaimana Pendapat Anda Tentang Variasi Produk Yang Kami Sediakan?</h5>
                            <div class="question fw-bold">
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_4" value="Sangat Memuaskan" required> Sangat Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_4" value="Memuaskan" required> Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_4" value="Cukup" required> Cukup
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_4" value="Kurang Memuaskan" required> Kurang Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_4" value="Sangat Tidak Memuaskan" required> Sangat Tidak Memuaskan
                                </label>
                            </div> <br><br>

                            <h5 class="fw-bold mb-3">5. Bagaimana Pendapat Anda Tentang Harga Produk Kami?</h5>
                            <div class="question fw-bold">
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_5" value="Sangat Memuaskan" required> Sangat Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_5" value="Memuaskan" required> Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_5" value="Cukup" required> Cukup
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_5" value="Kurang Memuaskan" required> Kurang Memuaskan
                                </label>
                                <label class="radio-inline" style="margin-right: 55px">
                                    <input type="radio" name="pertanyaan_5" value="Sangat Tidak Memuaskan" required> Sangat Tidak Memuaskan
                                </label>
                            </div> <br><br>

                                       
                            <div class="text-center">
                                <button type="submit" class="btn btn-success margin-auto fw-bold" align="center">Kirim</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection