@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Layanan
                                <a href="{{url('admin/service')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Nama Layanan</th>
                                        <td>{{$data->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td>
                                        <img width="100" src="/storage/imgs/{{$data->photo}}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Detail Singkat</th>
                                        <td>{{$data->small_desc}}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail Lengkap</th>
                                        <td>{{$data->detail_desc}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection