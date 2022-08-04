@extends('admin.layouts.index')
@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sach nhan vien</h2>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <a href="{{ route('staffs.create') }}" class="btn btn-info"><i class="bi bi-person-plus-fill"></i></a>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên nhan vien</th>
                    <th scope="col">so dien thoai</th>
                    <th scope="col">so ngay lam  viec</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hoạt động</th>
                
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($staff as $key => $staff)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $staff->ten_nhan_vien }}</td>
                        <td>{{ $staff->dien_thoai }}</td>
                        <td>{{ $staff->ngay_lam_viec }}</td>
                        <td>
                            @if($staff->image)
                                <img src="{{ asset('storage/'.$staff->image) }}" alt="" style="width: 120px; height: 120px">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                        {{-- <td>{{ $staff->due_date }}</td> --}}
                        <td>
                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('staffs.destroy', $staff->id) }}" class="btn btn-success" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="bi bi-trash"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
@endsection