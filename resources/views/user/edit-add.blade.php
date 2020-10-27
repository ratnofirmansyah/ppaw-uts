@extends('app')
@section('title', 'Manajemen User')
@section('content_header')
 <h2>Tabel User</h2>
@stop
@section('content')
	@if(!is_null($error))
		<small style="color: red">{{ $error }}</small>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">User Data</h3>
		</div>
		<div class="panel-body">
			<form role="form" action="@if(!is_null($key)){{ url('user/'.$key) }}@else{{ url('user') }}@endif" method="POST" enctype="multipart/form-data">
				<!-- PUT Method if we are editing -->
				@if(!is_null($key))
					{{ method_field("PUT") }}
				@endif

				{{ csrf_field() }}

				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="name" class="form-control" value="@if(!is_null($key)){{ $user->name }}@endif">
				</div>
				<div class="form-group">
					<label>Alamat Email</label>
					<input type="text" name="email" class="form-control" value="@if(!is_null($key)){{ $user->email }}@endif">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<select name="job" class="form-control">
						<option value="">select</option>
						<option @if(!is_null($key) && $user->job == 'Operator') selected @endif value="Operator">Operator</option>
						<option @if(!is_null($key) && $user->job == 'Frontend Dev') selected @endif value="Frontend Dev">Frontend Dev</option>
						<option @if(!is_null($key) && $user->job == 'Backend Dev') selected @endif value="Backend Dev">Backend Dev</option>
						<option @if(!is_null($key) && $user->job == 'Project Manajemen') selected @endif value="Project Manajemen">Project Manajemen</option>
						<option @if(!is_null($key) && $user->job == 'Tim Kreatif') selected @endif value="Tim Kreatif">Tim Kreatif</option>
					</select>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="@if(!is_null($key)){{ $user->password }}@endif">
				</div>
				<div class="form-group">
					<label>Konfirmasi Password</label>
					<input type="password" name="konfirmasi_password" class="form-control" value="@if(!is_null($key)){{ $user->password }}@endif">
				</div>
				<div class="form-group">
					<label>Foto</label>
					<input type="file" name="avatar" class="form-control" value="@if(!is_null($key)){{ $user->avatar }}@endif">
					<img src="@if(!is_null($key)){{ asset('storage/'.$user->avatar) }}@endif" style="max-width: 50px; max-height: 50px">
				</div>
				<button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </form>
		</div>
	</div>
@endsection

@section('javascript')
    <script>
    	
    </script>
@stop
<!-- 
* Author
* Ratno Firmansyah <asturof11@gmail.com>
-->