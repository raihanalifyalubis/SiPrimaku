@extends('Template.dashboard')

@section('content')
<section class="hero section">
    <div class="container">
        <h1 data-aos="zoom-out">Laporan Harian</h1>
        </br>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input data-aos="fade-up" class="form-control" min="2024-01-01" type="date" id="tanggal" name="tanggal" />
            </div>
        </div>
        </br>
        @if(!$hasil_bimbingans->isEmpty())
        <div data-aos="fade-up" class="table-responsive-sm">
            <table class="table table-light table-sm table-hover table-bordered">
                <thead align="center">
                    <td>No</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </thead>
                <?php $i = 1 ?>
                <tbody align="center" style="vertical-align:middle">
                    @foreach($hasil_bimbingans as $hasil_bimbingan)
                    <tr>
                        <td>{{ $i }}</td>
                        @for($j = 0; $j < count($mahasiswas[0]); $j++) @if($mahasiswas[0][$j]['id']==$hasil_bimbingan->id_mahasiswa)
                            <td>{{ $mahasiswas[0][$j]['nama'] }}</td>
                            @endif
                            @endfor
                            <td>{{ $hasil_bimbingan->tanggal }}</td>
                            <td>{{ $hasil_bimbingan->status }}</td>
                            <td><a href="{{ url('rincianLaporan/'.encrypt($hasil_bimbingan->id)) }}"><button type="button" class="btn btn-primary position-relative">Lihat
                                        @if($hasil_bimbingan->status == "Belum Diverifikasi")
                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                                        @endif </button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>
<script>
    const selectElement = document.querySelector("#tanggal");

    if (window.location.href.substring(window.location.href.lastIndexOf('/') + 1) != 'lihatLaporan') {
        const tanggal = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
        inputTanggal = document.getElementById('tanggal');
        inputTanggal.value = tanggal;
    }

    selectElement.addEventListener("change", (event) => {
        console.log(window.location.href);
        if (window.location.href.substring(window.location.href.lastIndexOf('/') + 1) == 'lihatLaporan' ||
            window.location.href.substring(window.location.href.lastIndexOf('/') + 1) == 'lihatLaporan#') {
            window.location.href = `lihatLaporan/${event.target.value}`;
        } else {
            window.location.href = `${event.target.value}`;
        }
    });
</script>
@endsection