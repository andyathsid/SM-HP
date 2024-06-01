@extends('layout')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail {{$data->full_name}}
                <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{$data->department->title}}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td><img width="80" src="/storage/imgs/{{$data->photo}}" /></td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{$data->bio}}</td>
                    </tr>
                    <tr>
                        <th>Tipe Gaji</th>
                        <td>{{$data->salary_type}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Gaji</th>
                        <td>{{$data->salary_amt}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
