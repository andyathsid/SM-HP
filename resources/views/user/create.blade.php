@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna
                                <a href="{{url('admin/user')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                            @endif

                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/user')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Nama Pengguna <span class="text-danger">*</span></th>
                                            <td><input name="name" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Email <span class="text-danger">*</span></th>
                                            <td><input name="email" type="email" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Password <span class="text-danger">*</span></th>
                                            <td><input name="password" type="password" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Peran <span class="text-danger">*</span></th>
                                            <td>
                                                <select name="roles[]" class="form-control" multiple> 
                                                    <option value="">--- Pilih ---</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role}}">{{$role}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection