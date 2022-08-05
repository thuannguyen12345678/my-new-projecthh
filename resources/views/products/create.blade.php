@extends('home')

@section('title', 'Thêm mới công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Thêm mới sản phẩm</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label>Gía</label>
                    <textarea class="form-control" rows="3" name="price" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <label>slug</label>
                    <input class="form-control" rows="3" name="slug" required>
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <input class="form-control" rows="3" name="description" required>
                </div>
                <div class="form-group">
                    <label>Trang thái</label>
                    <select name="status">
                        <option value="1">còn</option>
                        <option value="2">hết</option>

                    </select>

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
