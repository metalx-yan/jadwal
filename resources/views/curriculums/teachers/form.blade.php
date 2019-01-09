<div class="card-body">
<div class="form-group">
	{{-- @include('partials._alert') --}}
	<div class="row">
		<div class="col-lg-12">
			<label for="">NIP</label>
			<input type="text" name="nip" value="{{ old('nip') }}" class="form-control {{ $errors->has('nip') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('nip', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ old('code') }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Status</label>
			<select class="form-control {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status">
				<option>-- Select --</option>
				@foreach (App\Models\Teacher::status() as $key)
				  <option value="{{ $key }}"> {{ ucwords($key) }}</option>
				@endforeach
			</select>
			{!! $errors->first('status', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Mengajar</label>
			<input type="text" value="{{ ucwords($mix->name) }}" disabled class="form-control">
			<input type="hidden" name="type_teacher_id" value="{{ $mix->id }}" class="form-control">
			{!! $errors->first('type_teacher_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

			{{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="form-control"> --}}

{{-- 
<br>

<div class="card">
	<div class="card-header headercolorincurrent fontsopher">
		Tambah Akun Guru
	</div>
</div>
					
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Username</label>
			<input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autocomplete="off">
			{!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Password</label>
			<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off">
			{!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="off">
			{!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div> --}}

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
