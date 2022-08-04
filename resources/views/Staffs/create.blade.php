@extends('home')

@section('title', 'Thêm mới công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Them nhan vien</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên nhan vien</label>
                    <input type="text" class="form-control"  name="name" required>
                </div>

                <div class="form-group">
                    <label>so dien thoai</label>
                    <input type="text" class="form-control" rows="3" name="content" required>
                </div>
                <div class="form-group">
                    <label>ngay vao lam</label>
                    <input type="date" class="form-control" rows="3" name="thoigian" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="image" class="form-control-file" required>
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