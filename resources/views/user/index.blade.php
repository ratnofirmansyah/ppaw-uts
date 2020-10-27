@extends('app')
@section('title', 'Manajemen User')
@section('content_header')
 <h2>Tabel User</h2>
@stop
@section('content')
<div class="col-md-12">
	<div class="pull-left">
		<h3>Tabel Rekaman User</h3>
	</div>
	<div class="pull-right">
		<a href="{{ url('user/create') }}" class="btn btn-sm btn-primary">Tambah</a>
	</div>
</div>
<table class="table table-striped table-hover">
	<thead class="thead">
		<th>No</th>
		<th>Foto</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jabatan</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ ++$i }}</td>
			<td>
				<img src="{{ asset('storage/'.$user->avatar) }}" style="max-height: 50px; max-width: 50px">
			</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->job }}</td>
			<td>
				<a class="btn btn-sm btn-primary" href="{{ url('user/'.$user->id) }}"><i class="fa fa-fw faedit"></i> Edit</a>
				<form action="{{ url('user/'.$user->id) }}" method="post">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-fw fa-trash"></i> Hapus</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
