<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate(
            [
                'LOAIGIAY' => 'required',
                'THUONGHIEU' => 'required',
                'SIZE' => 'required',
                'MAUSAC' => 'required',
                'MOTA' => 'required',
                'SLUG' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

            ],
            [
                'LOAIGIAY.required' => 'Yêu cầu nhập loại giày',
                'THUONGHIEU.required' => 'Yêu cầu nhập thương hiệu giày',
                'SIZE.required' => 'Yêu cầu nhập size giày',
                'MAUSAC.required' => 'Yêu cầu nhập màu sắc giày',
                'MOTA.required' => 'Yêu cầu nhập mô tả giày',
                'SLUG.required' => 'Yêu cầu nhập slug giày',
                'image.required' => 'Yêu cầu thêm hình ảnh',
                'image.image' => 'Hình ảnh truyện phải có',
                // 'tacgia.required' => 'Tác giả truyện phải có nhé',
                // 'slug_truyen.required' => 'Slug truyện phải có',
                // 'hinhanh.required' => 'Hình ảnh truyện phải có',

            ]
        );



        $category = new Category();
        $category->LOAIGIAY = $request->input('LOAIGIAY');
        $category->THUONGHIEU = $request->input('THUONGHIEU');
        $category->SIZE = $request->input('SIZE');
        $category->MAUSAC = $request->input('MAUSAC');
        $category->MOTA = $request->input('MOTA');
        $category->SLUG = $request->input('SLUG');
        $category->image = $request->input('image');





        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $category->image = $path;
        // }

        $get_image = $request->image;
        $path = 'public/uploads/login/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $category->image = $new_image;
        $request['login_image'] = $new_image;

        $category->save();

        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('categories.list');
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
        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
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
        $category = Category::findOrFail($id);
      
        $category->LOAIGIAY = $request->input('LOAIGIAY');
        $category->THUONGHIEU = $request->input('THUONGHIEU');
        $category->SIZE = $request->input('SIZE');
        $category->MAUSAC = $request->input('MAUSAC');
        $category->MOTA = $request->input('MOTA');
        $category->SLUG = $request->input('SLUG');
        $category->image = $request->input('image');
       
        // if ($request->hasFile('image')) {

        //     //xoa anh cu neu co
        //     $currentImg = $category->image;
        //     if ($currentImg) {
        //         Storage::delete('/public/' . $currentImg);
        //     }
        //     // cap nhat anh moi
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $category->image = $path;
        // }

        $get_image=$request->image;
        if($get_image){
            $path='public/uploads/login/'.$category->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/uploads/login/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $category->image=$new_image;
        $request['login_image']=$new_image;     
        }
        $category->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach category
        return redirect()->route('categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $image = $category->image;

        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $category->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach category
        return redirect()->route('categories.list');
    }
}
