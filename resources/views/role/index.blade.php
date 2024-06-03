@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manajemen Peran
                                <a href="{{url('admin/role/create')}}" class="float-right btn btn-success btn-sm">Tambah Baru</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Peran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Peran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($roles)
                                            @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    <a href="{{url('admin/role/'.$role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('admin/role/'.$role->id).'/give-permissions'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Konfirmasi penghapusan data.')" href="{{url('admin/role/'.$role->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection

@endsection