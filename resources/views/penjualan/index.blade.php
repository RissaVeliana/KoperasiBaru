@extends('layouts.template')
@section('content')


 <!-- Left side column. contains the logo and sidebar -->
 
<div class="row">
	<center><h1>Transaksi Penjualan</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading"> 
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">
				<table class="table">
				<a class="btn btn-info" href="{{route('penjualan.create')}}">Tambah Penjualan </a>
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Barang</th>
							<th>Merk Barang</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th>Tanggal Penjualan</th>
							<th colspan="2">Action</th>
							
						</tr>
					</thead>

					<tbody>
					<?php $no=1 ?>

					@foreach($penjualan as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->jenis}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->jumlah}}</td>
							<td>{{$data->total }}</td>
							<td>{{$data->tgl_penjualan}}</td>

							<td>
								<a class="btn btn-warning" href="/admin/penjualan/{{$data->id}}/edit">Edit</a></td>
								<td><form action="{{route('penjualan.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="delete">
									{{csrf_field()}}
								</form>
							</td>

						</tr>
					@endforeach
					</tbody>
				</table>
			</div>

	</div>
		</div>
	</div>

@endsection