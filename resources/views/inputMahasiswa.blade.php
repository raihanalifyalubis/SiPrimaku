@extends('Template.dashboard')

@section('content')
<section class="hero section">

    <div class="container">
        <h1 data-aos="zoom-out">Input Mahasiswa</h1>
        </br>
        @if (session('error'))
        <div data-aos="zoom-out" class="alert alert-danger" role="alert" align="center">{{ session('error') }}
        </div>
        @endif
        </br>
        <!-- Button trigger modal -->
        <button data-aos="zoom-out" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Input Dengan Excel
        </button>
        </br></br></br>
        <a href="{{ route('inputTbl') }}"><button data-aos="zoom-out" type="button" class="btn btn-primary">Daftarkan Akun</button></a>
        <a href="{{ route('exportExcel') }}"><button data-aos="zoom-out" type="button" class="btn btn-success">Download Excel File</button></a>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan File Excel (.xlsx)</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('inputMahasiswa') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="file" name="file" class="form-control" required>

                            <br>
                            <button class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Import Data Mahasiswa</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a target="_blank" href="{{ url('Template.xlsx') }}"><button type="button" class="btn btn-success"><i class="fa fa-download"></i> Download Template</button></a>
                    </div>
                </div>
            </div>
        </div>
        </br></br>
        @if(session('inputMhs'))
        <div class="table-responsive-sm">
            <table data-aos="fade-up" class="table table-light table-sm table-hover table-bordered">
                <thead align="center" style="vertical-align:middle">
                    <td>No</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Nama Lengkap</td>
                    <td>NIM</td>
                    <td>Jenis Kelamin</td>
                    <td>Program Studi</td>
                    <td>Semester</td>
                    <td>Tanggal Awal</td>
                    <td>Tanggal Akhir</td>
                    <td>Aksi</td>
                </thead>
                <tbody align="center" style="vertical-align:middle">
                    <?php $i = 1 ?>
                    @foreach(session('inputMhs') as $input)
                    <tr>
                        <td>{{ $input[0] }}</td>
                        <td>{{ $input[1] }}</td>
                        <td>{{ $input[2] }}</td>
                        <td>{{ $input[3] }}</td>
                        <td>{{ $input[4] }}</td>
                        <td>{{ $input[5] }}</td>
                        <td>{{ $input[6] }}</td>
                        <td>{{ $input[7] }}</td>
                        <td>{{ strval($input[8]) }}</td>
                        <td>{{ strval($input[9]) }}</td>
                        <td><button onclick="yakin(<?= $i ?>)" type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>
<script>
    function yakin(id) {
        Swal.fire({
            title: "Apakah Anda Yakin Ingin Menghapus Data?",
            icon: "warning",
            showDenyButton: true,
            confirmButtonText: "Ya",
            denyButtonText: `Tidak`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var urlnya = "hapusInputMhs/" + id;
                window.open(urlnya, "_top");
            }
        });
    }
</script>
@endsection