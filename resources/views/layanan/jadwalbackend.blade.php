@extends('template.mainbackend')
@section('content')

<!-- PAGE-HEADER END -->
<div class="page-header">
    <h1 class="page-title">{{ $judul }}</h1>
</div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createjadwalModal">
                Tambah
              </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                      <!-- Menampilkan pesan error jika ada -->
                    <!-- Menampilkan pesan error jika ada -->

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Isi Jadwal</th>
                                <th class="wd-15p border-bottom-0">Jam Awal</th>
                                <th class="wd-15p border-bottom-0">Jam Akhir</th>
                                <th class="wd-15p border-bottom-0">Tanggal Awal</th>
                                <th class="wd-15p border-bottom-0">Tanggal Akhir</th>
                                <th class="wd-15p border-bottom-0">PIC</th>
                                <th class="wd-15p border-bottom-0">Penyelenggara</th>
                                <th class="wd-15p border-bottom-0">Keterangan</th>
                                <th class="wd-15p border-bottom-0">Aksi</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($jadwal as $j)
                            <tr>
                                <td>{{ $j->isi_jadwal }}</td>
                                <td>{{ date('H:i', strtotime($j->jam_awal)) }}</td> <!-- Tampilkan jam_awal -->
                                <td>{{ date('H:i', strtotime($j->jam_akhir)) }}</td> <!-- Tampilkan jam_akhir -->
                                <td>{{ date('d F Y', strtotime($j->tanggal_awal)) }}</td>
                                <td>{{ date('d F Y', strtotime($j->tanggal_akhir)) }}</td>
                                <td>{{ $j->pic }}</td>
                                <td>{{ $j->penyelenggara }}</td>
                                <td>{{ $j->keterangan }}</td>
                                <td>
                                    <button onclick="editFunc('{{ $j->id }}')" class="btn btn-warning">
                                        <i class="side-menu__icon fa fa-pencil"></i> <!-- Edit -->
                                    </button>
                                    <button onclick="delFunc({{ $j->id }})" class="btn btn-danger">
                                        <i class="side-menu__icon fa fa-trash"></i> <!-- Delete -->
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="createjadwalModal" tabindex="-1" aria-labelledby="createjadwalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createjadwalModalLabel">Tambah Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('createJadwal') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="isi_jadwal">Isi Jadwal</label>
                                            <input type="text" class="form-control" id="isi_jadwal" name="isi_jadwal" placeholder="Isi Jadwal">
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_awal">Jam Awal</label>
                                            <input type="time" class="form-control" id="jam_awal" name="jam_awal">
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_akhir">Jam Akhir</label>
                                            <input type="time" class="form-control" id="jam_akhir" name="jam_akhir">
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="tanggal_awal">Tanggal Awal</label>
                                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                                        </div>
                                        <div class="form-group">
                                            <label for="">PIC</label>
                                            <select class="form-control" id="pic" name="pic">
                                                <option value="">-Pilih PIC-</option>
                                                <option value="IT">IT</option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="penyelenggara">Penyelenggara</label>
                                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Nama Penyelenggara">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                                        </div>                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal delete -->
                    <div class="modal fade" id="deletejadwalModal" tabindex="-1" role="dialog"
                        aria-labelledby="deletejadwalModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ url('deleteJadwal') }}" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editlinkModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <h6>Apakah anda yakin menghapus jadwal ini?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal edit -->
                    <div class="modal fade" id="editjadwalModal" tabindex="-1" aria-labelledby="editjadwalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editjadwalModalLabel">Edit Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editLinkForm" action="{{ url('/jadwalbackend/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="edit_id">
                                        <div class="form-group">
                                            <label for="isi_jadwal">Isi Jadwal</label>
                                            <input type="text" class="form-control" id="edit_isi_jadwal" name="isi_jadwal">
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_awal">Jam Awal</label>
                                            <input type="time" class="form-control" id="edit_jam_awal" name="jam_awal">
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_akhir">Jam Akhir</label>
                                            <input type="time" class="form-control" id="edit_jam_akhir" name="jam_akhir">
                                        </div>                     
                                        <div class="form-group">
                                            <label for="tanggal_awal">Tanggal Awal</label>
                                            <input type="date" class="form-control" id="edit_tanggal_awal" name="tanggal_awal">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="edit_tanggal_akhir" name="tanggal_akhir">
                                        </div>
                                          <div class="form-group">
                                            <label for="">PIC</label>
                                            <select class="form-control" id="edit_pic" name="pic">
                                                <option value="">-Pilih PIC-</option>
                                                <option value="IT">IT</option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="penyelenggara">Penyelenggara</label>
                                            <input type="text" class="form-control" id="edit_penyelenggara" name="penyelenggara" placeholder="Nama Penyelenggara">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">keterangan</label>
                                            <textarea class="form-control" id="edit_keterangan" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                                        </div>                  
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // Tunggu hingga DOM selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {
        // Cari elemen dengan ID "errorAlert"
        var errorAlert = document.getElementById('errorAlert');
        var successAlert = document.getElementById('successAlert');
        if (errorAlert) {
            // Hilangkan elemen setelah 3 detik (3000 ms)
            setTimeout(function () {
                errorAlert.classList.add('fade');
                setTimeout(function () {
                    errorAlert.remove();
                }, 500); // Tunggu animasi fade selesai (500 ms)
            }, 3000);
        }
        if (successAlert) {
        setTimeout(function () {
            successAlert.classList.add('fade');
            setTimeout(function () {
                successAlert.remove();
            }, 500); // Tunggu animasi fade selesai (500 ms)
        }, 3000);
    }
    });
</script>

<script>

    function editFunc(id = null) {
        $.ajax({
            type: "GET",
            url: "{{ url('jadwalbackend/') }}" + '/' + id,
            success: function(res) {
                // Memasukkan nilai-nilai dari respons ke dalam form modal
                $('#edit_id').val(res.id);
                $('#edit_isi_jadwal').val(res.isi_jadwal);
                $('#edit_jam_awal').val(res.jam_awal);
                $('#edit_jam_akhir').val(res.jam_akhir);
                $('#edit_tanggal_awal').val(res.tanggal_awal);
                $('#edit_tanggal_akhir').val(res.tanggal_akhir);
                $('#edit_pic').val(res.pic);
                $('#edit_penyelenggara').val(res.penyelenggara);
                $('#edit_keterangan').val(res.keterangan);

                $('#editjadwalModal').modal('show');
            }
        });
    }


    function delFunc(id) {
           $('#deletejadwalModal #id').val(id);
           $('#deletejadwalModal').modal('show');
       }
   </script>