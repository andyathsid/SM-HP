@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lihat Tipe Kamar
                                <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Title</th>
                                        <td>{{$data->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail</th>
                                        <td>{{$data->detail}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection