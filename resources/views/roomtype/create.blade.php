@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Tipe Kamar
                                <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
                            </h6>
                        </div>

                        @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                        @endif

                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/roomtype')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Nama Tipe Kamar</th>
                                            <td><input name="title" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>
                                                <input name="price" type="text" class="form-control" id="formattedInput" data-type="currency" />
                                                <input type="hidden" name="unformatted_value" id="unformattedInput" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td><textarea name="detail" class="form-control"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Galeri</th>
                                            <td><input type="file" multiple name="imgs[]" /></td>
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