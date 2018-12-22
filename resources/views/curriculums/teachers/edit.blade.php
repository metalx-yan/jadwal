@extends('main')

@section('title', 'Edit Data Guru')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')
	<h1 class="section-header">
	  <div>Edit Data Guru</div>
	</h1>

@php
	$no = 1;
@endphp

	<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-teacher fontsopher">
				    <tr>
				      <th>No</th>
				      <th>NIP</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Tipe Mengajar</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $teacher->nip }}</td>
				      <td>{{ $teacher->code }}</td>
				      <td>{{ $teacher->name }}</td>
				      <td>{{ $teacher->type_teacher->type }}</td>
				      <td>
				      	@if ($teacher->status == "Aktif")
				      		<span class="badge badge-success"><b>{{ $teacher->status }}</b></span>
						@else
				      		<span class="badge badge-danger"><b>{{ $teacher->status }}</b></span>
						
						@endif
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Guru
			</div>
				<form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
				@csrf
				@method('PUT')
					@include('curriculums.teachers.form', [
							'submit_button' => 'Update'
						])
					
					<a href="{{ route('mix.teacher', $teacher->id) }}" type="text" class="form-control btn-danger fontsopher style">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
  		
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

		@if(Session::has('sweetalert'))
		  <script>
		      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
		  </script>
		  {{-- <?php Session::forget('sweetalert'); ?> --}}
		@endif
	
@endsection()