@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Booking
                                <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Pilih Pelanggan<span class="text-danger">*</span></th>
                                            <td>
                                                <select class="form-control" name="customer_id">
                                                    <option>--- Pilih ---</option>
                                                    @foreach($data as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Check-In<span class="text-danger">*</span></th>
                                            <td><input name="checkin_date" type="date" class="form-control checkin-date" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Check-Out<span class="text-danger">*</span></th>
                                            <td><input name="checkout_date" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ketersediaan Kamar<span class="text-danger">*</span></th>
                                            <td>
                                                <select class="form-control room-list" name="room_id">

                                                </select>
                                                <p>Harga: <span class="show-room-price"></span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Dewasa<span class="text-danger">*</span></th>
                                            <td><input name="total_adults" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Anak-anak</th>
                                            <td><input name="total_children" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="hidden" name="roomprice" class="room-price" value="" />
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

                @section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $(".checkin-date").on('blur',function(){
        var checkindate = $(this).val();
        // Ajax
        $.ajax({
            url:"{{url('admin/booking')}}/available-rooms/"+checkindate,
            dataType:'json',
            beforeSend:function(){
                $(".room-list").html('<option>--- Loading ---</option>');
            },
            success:function(res){
                var html='';
                $.each(res.data,function(index,row){
                    html+='<option data-price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                });
                $(".room-list").html(html);
                var selectedPrice = $(".room-list").find('option:selected').attr('data-price');
                $(".room-price").val(selectedPrice);
                $(".show-room-price").text(formatIDR(selectedPrice));
            }
        });
    });

    $(document).on("change",".room-list",function(){
        var selectedPrice = $(this).find('option:selected').attr('data-price');
        $(".room-price").val(selectedPrice);
        $(".show-room-price").text(formatIDR(selectedPrice));
    });

    function formatIDR(amount) {
        return "Rp" + Number(amount).toLocaleString('id-ID');
    }
});
</script>
@endsection

@endsection