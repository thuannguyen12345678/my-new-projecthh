@extends('admin.layouts.index')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sách sản phẩm</h2>
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
            <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Hoạt động</th>
                
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $key => $product)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        
                        <td>
                            @if($product->image)
                                <img src="{{ asset('public/uploads/login/'.$product->image) }}" alt="" style="width: 120px; height: 120px">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->status }}</td>
                       
                        {{-- <td>{{ $product->due_date }}</td> --}}
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">sửa</a>
                        <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
@endsection