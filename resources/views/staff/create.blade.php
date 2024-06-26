@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pegawai
                                <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/staff')}}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td><input name="full_name" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Pilih Departemen</th>
                                            <td>
                                                <select name="department_id" class="form-control">
                                                    <option value="0">--- Pilih ---</option>
                                                    @foreach($departs as $dp)
                                                    <option value="{{$dp->id}}">{{$dp->title}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Gambar</th>
                                            <td><input name="photo" type="file" /></td>
                                        </tr>
                                        <tr>
                                            <th>Bio</th>
                                            <td><textarea class="form-control" name="bio"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Tipe Gaji</th>
                                            <td>
                                                <input type="radio" name="salary_type" value="Harian"> Harian
                                                <input type="radio" name="salary_type" value="Bulanan"> Bulanan
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Gaji</th>
                                            <td>
                                                <input type="text" name="salary_amt" class="form-control" type="number" id="formattedInput" data-type="currency"/>
                                                <input type="hidden" name="unformatted_value" id="unformattedInput" />
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
@yield('scripts')