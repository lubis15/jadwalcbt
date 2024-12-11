@extends('template.mainbackend')
@section('content')
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $judul }}</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <!-- Total Jadwal -->
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-muted">
                            <h4>Total Jadwal</h4>
                            <h2>{{ $jumlahJadwal }}</h2>
                        </div>
                        <div class="ms-auto">
                            <i class="fa fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 END -->

</div> 
@endsection
