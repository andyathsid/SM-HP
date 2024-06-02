@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Izin untuk {{$role->name}}
                    <a href="{{url('admin/role')}}" class="float-right btn btn-success btn-sm">Lihat Semua</a>
                </h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                @endif
                <div class="table-responsive">
                    <form method="post" action="{{url('admin/role/'.$role->id.'/give-permissions')}}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                        @error('permission')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Pilih Izin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <label>
                                                <input
                                                    type="checkbox"
                                                    name="permission[]"
                                                    value="{{ $permission->name }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                />
                                                {{ $permission->name }}
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
