<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staffs::all();
        return view('Staffs.list', compact('staff'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new Staffs();
        $staff->ten_nhan_vien = $request->input('name');
        $staff->dien_thoai = $request->input('content');
        $staff->ngay_lam_viec = $request->input('thoigian');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $staff->image = $path;
        }
        $staff->save();

        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staffs::findOrFail($id);
        return view('Staffs.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = Staffs::findOrFail($id);
        $staff->ten_nhan_vien = $request->input('name');
        $staff->dien_thoai = $request->input('content');
        $staff->ngay_lam_viec = $request->input('thoigian');
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $staff->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $staff->image = $path;
        }
        $staff->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach staff
        return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staffs::findOrFail($id);
        $image = $staff->image;

        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $staff->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach staff
        return redirect()->route('staffs.index');
    }
}
