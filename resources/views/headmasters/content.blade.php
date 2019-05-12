@extends('main')

@section('title', 'Kepala Sekolah')

@section('content')

<h1 class="section-header">
  <div>{{ ucwords(Auth::user()->role->name) }} Dashboard </div>
</h1>

<div class="row">
{{-- <div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-teacher">
      <i class="ion ion-person"></i>
    </div>
    <div class="card-wrap ">
      <div class="card-header header">
        <h4>Total Guru Aktif</h4>
      </div>
      <div class="card-body header">
        @if (Auth::check() || App\Models\Teacher::first()->status = "aktif")
            {{  App\Models\Teacher::where('status', 'aktif')->count() }}
        @endif
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-room" >
      <i class="ion ion-home"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Ruang</h4>
      </div>
      <div class="card-body header">
        {{ App\Models\Room::all()->count() }}
      </div>
    </div>
  </div>
</div> --}}
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-lesson">
      <i class="ion ion-clipboard"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Tahun Ajaran</h4>
      </div>
      <div class="card-body header">
        {{ App\Models\Approval::all()->count() }}
      </div>
    </div>
  </div>
</div>
{{-- <div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-danger">
   		<i class="ion ion-university"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Jurusan</h4>
      </div>
      <div class="card-body header">
        {{ Auth::user()->where('role_id', 2)->count() }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-warning">
      <i class="ion ion-ios-paper-outline"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Laporan Jadwal Disetujui</h4>
      </div>
      <div class="card-body header">
        {{ Auth::user()->generates->where('read', 1)->count() }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6 ">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-success">
      <i class="ion ion-record"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Pengguna</h4>
      </div>
      <div class="card-body header">
        {{ Auth::user()->count() }}
      </div>
    </div>
  </div>
</div> --}}                  
</div>
@endsection
