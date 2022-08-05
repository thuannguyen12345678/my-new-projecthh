@extends('admin.layouts.index')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="col-12">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục sản phẩm</th>
                        <th scope="col">Thương hiệu</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hình ảnh</th>


                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->LOAIGIAY }}</td>
                            <td>{{ $category->THUONGHIEU }}</td>
                            <td>{{ $category->SIZE }}</td>
                            <td>{{ $category->MAUSAC }}</td>
                            <td>{{ $category->MOTA }}</td>
                            <td>{{ $category->SLUG }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('public/uploads/login/' . $category->image) }}" alt=""
                                        style="width: 120px; height: 120px">
                                @else
                                    {{ 'Chưa có ảnh' }}
                                @endif
                            </td>
                            {{-- <td>{{ $categories->due_date }}</td> --}}
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">sửa</a>
                                <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
