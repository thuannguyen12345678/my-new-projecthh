@extends('home')

@section('title', 'Cập nhật công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhật công việc</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên giày</label>
                    <input type="text" class="form-control" name="LOAIGIAY" value="{{ $category->LOAIGIAY }}" required>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <input type="text" class="form-control" name="THUONGHIEU" value="{{ $category->THUONGHIEU }}" required>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="text" class="form-control" name="SIZE" value="{{ $category->SIZE }}" required>
                </div>
                <div class="form-group">
                    <label>Màu Sắc</label>
                    <input type="text" class="form-control" name="MAUSAC" value="{{ $category->MAUSAC }}" required>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" name="MOTA" value="{{ $category->MOTA }}" required>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <textarea class="form-control" rows="3" name="SLUG"  required>{{ $category->SLUG }}</textarea>
                </div>

                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" >
                </div>

                {{-- <div class="form-group">
                    <label>Ngày hết hạn</label>
                    <input type="date" name="due_date" class="form-control"  value="{{ $task->due_date }}" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection