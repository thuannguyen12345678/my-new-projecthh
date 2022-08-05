<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('products.list', compact('product'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        

        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $product->image = $path;
        // }

        $get_image=$request->image;
        $path='public/uploads/login/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image=$new_image;
        $request['login_image']=$new_image;



        // if ($request->hasFile('image')) {
        //     $file = $request->image;
        //     $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
        //     $fileName = time();//45678908766 tạo tên file theo thời gian
        //     $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
        //     $path = 'storage/'. $request->file('image')->store('image', 'public');//lưu file vào mục public/images với tê mới là $newFileName
        //     $product->image = $path;
        // }
        $product->save();

        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('products.index');
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
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
       
        // if ($request->hasFile('image')) {

        //     //xoa anh cu neu co
        //     $currentImg = $product->image;
        //     if ($currentImg) {
        //         Storage::delete('/public/' . $currentImg);
        //     }
        //     // cap nhat anh moi
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $product->image = $path;
        // }

        $get_image=$request->image;
        if($get_image){
            $path='public/uploads/login/'.$product->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/uploads/login/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image=$new_image;
        $request['login_image']=$new_image;     
        }
        $product->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach product
        return redirect()->route('products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image = $product->image;

        //delete image
        // if ($image) {
        //     Storage::delete('/public/' . $image);
        // }
        $image = 'public/uploads/login/'.$product->image;
        if(file_exists($image)){
            unlink($image);
        }

        $product->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach product
        return redirect()->route('products.index');
    }
}
