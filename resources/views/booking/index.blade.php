@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Booking
                                <a href="{{url('admin/booking/create')}}" class="float-right btn btn-success btn-sm">Tambah Baru</a>
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
                                            <th>Pelanggan</th>
                                            <th>Kamar</th>
                                            <th>Tipe Kamar</th>
                                            <th>Tanggal Check-In</th>
                                            <th>Tanggal Check-Out</th>
                                            <th>Ref</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Pelanggan</th>
                                            <th>Kamar</th>
                                            <th>Tipe Kamar</th>
                                            <th>Tanggal Check-In</th>
                                            <th>Tanggal Check-Out</th>
                                            <th>Ref</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td>{{$booking->customer->full_name}}</td>
                                            <td>{{$booking->room->title}}</td>
                                            <td>{{$booking->room->Roomtype->title}}</td>
                                            <td>{{$booking->checkin_date}}</td>
                                            <td>{{$booking->checkout_date}}</td>
                                            <td>{{$booking->ref}}</td>
                                            <td><a href="{{url('admin/booking/'.$booking->id.'/delete')}}" class="text-danger" onclick="return confirm('Konfirmasi penghapusan data.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
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