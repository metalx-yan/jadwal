@extends('main')

@section('title', 'Mata Pelajaran')

@section('content')

<h1 class="section-header">
  <div>Daftar Mata Pelajaran {{ ucwords($view->name) }}</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-lesson fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Semester</th>
				      <th>Guru</th>
				      <th>Akun Jurusan</th>
				      <th>Kelas Jurusan</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($view->lessons as $views)
					  	@if ($views->type_lesson->name == 'jurusan')
						    <tr>
						      <th scope="row">{{ $no }}</th>
								@php
									$no++;	
								@endphp
						      <td>{{ $views->code }}</td>
						      <td>{{ $views->name }}</td>
						      <td>{{ $views->semester }}</td>
							  <td>@foreach ($views->teachers as $teacher)
						      		{{ ucwords($teacher->name) }},<br>
					      	   @endforeach</td>
					      	   <td>@foreach ($views->users as $user)
							   	   {{ ucwords($user->name) }},<br>
						       @endforeach</td>
						       <td>@foreach ($views->majors as $major)
							    	  {{ ucwords($major->name) }},<br>
						        @endforeach</td>
						    </tr>
					  	@endif
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection


