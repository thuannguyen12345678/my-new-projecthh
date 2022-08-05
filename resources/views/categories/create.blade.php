@extends('home')

@section('title', 'Thêm mới công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Thêm mới sản phẩm</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên giày</label>
                    <input type="text" class="form-control" name="LOAIGIAY" >
                    @error('LOAIGIAY')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Thương hiệu</label>
                    <input type="text" class="form-control" name="THUONGHIEU" >
                    @error('THUONGHIEU')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="text" class="form-control" name="SIZE" >
                    @error('SIZE')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Màu Sắc</label>
                    <input type="text" class="form-control" name="MAUSAC" >
                    @error('MAUSAC')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" name="MOTA" >
                    @error('MOTA')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input type="text" class="form-control" name="SLUG" >
                    @error('SLUG')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label>Gía</label>
                    <textarea class="form-control" rows="3" name="price" ></textarea>
                </div> --}}

                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file" >
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="exampleFormControlFile1">Ngày hết hạn</label>
                    <input type="date" name="due_date" class="form-control" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
