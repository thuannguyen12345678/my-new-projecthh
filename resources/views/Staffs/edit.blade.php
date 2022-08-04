@extends('home')

@section('title', 'Cập nhật công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhật công việc</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('staffs.update', $staff->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên nhaan vien</label>
                    <input type="text" class="form-control" name="name" value="{{ $staff->ten_nhan_vien }}" required>
                </div>

                <div class="form-group">
                    <label>dien thoai</label>
                    {{-- <input class="form-control" rows="3" name="content"  required>{{ $staff->dien_thoai }}> --}}
                    <input type="text" class="form-control" name="content" value="{{ $staff->dien_thoai }}" required>
                </div>
                {{-- <div class="form-group">
                    <label>ngay vao lam</label>
                    <textarea class="form-control" rows="3" name="thoigian"  required>{{ $staff->ngay_lam_viec }}</textarea>
                </div> --}}
                <div class="form-group">
                    <label>ngay vao lam</label>
                    <input type="date" class="form-control" rows="3" value="{{ $staff->ngay_lam_viec }}"
                        name="thoigian" required>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                {{-- <div class="form-group">
                    <label>Ngày hết hạn</label>
                    <input type="date" name="due_date" class="form-control"  value="{{ $staff->due_date }}" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
