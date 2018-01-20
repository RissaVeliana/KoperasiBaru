@extends('layouts.template')
@section('content')

   <div class="row">
	<center><h1>Akun</h1><br></center>
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading"> 
		<div class="panel-title pull-right">
			</div></div>
			<div class="panel-body">
     <div class="table-responsive">
     <table class="table">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true">  Tambah Data</i>
    </button>
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
              <th>Email</th>
              <th colspan="2">Action</th>
						</tr>
					</thead>

					<tbody>
					<?php $no=1; ?>
					@foreach($akun as $data)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
							<td>
                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit
                </button>
              </td>
								<td><form action="{{route('akun.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="delete">
									{{csrf_field()}}
								</form>
							</td>
						</tr>


              <!-- EDIT -->
            <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('akun.update', $data->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group">
                      <label class="control-lable">nama</label>
                      <input type="text" name="nama" class="form-control" value="{{$data->name}} " required>
                    </div>

                   <div class="form-group">
                      <label class="control-lable">Email</label>
                      <input type="text" name="email" class="form-control" value="{{$data->email}} " required>
                    </div>

                   <div class="form-group">
                      <label class="control-lable">Password</label>
                      <input type="password" name="password" class="form-control" value="{{$data->password}} " required>
                    </div>


                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>

					@endforeach
					</tbody>
				</table>
     	
     </div>
     </div>

	</div>
		</div>


    <!-- Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class= "modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('akun.store')}}" method="post"> 
        {{csrf_field()}}

         <div class="form-group">
             <label class="control-lable">nama</label>
              <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
              <label class="control-lable">Email</label>
              <input type="text" name="email" class="form-control" required>
          </div>

           <div class="form-group">
               <label class="control-lable">Password</label>
               <input type="password" name="password" class="form-control" required>
           </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection