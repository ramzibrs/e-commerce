<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class CategoriesController extends Controller
{
    public function index(){
        $category = category::all();
        return view ('admin.categories.categories',compact('category'));

    }

    public function add(){
        return view('admin.categories.add');

    }
    public function insert(request $request){
        $category = new category();
        if($request->hasFile('image'))
        {

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }

        $category->name = $request ->input('name');
        $category->slug = $request ->input('slug');
        $category->description = $request ->input('description');
        $category->status = $request ->input('status') == true ? '1':'0';
        $category->popular = $request ->input('popular')== true ? '1':'0';
        $category->meta_title = $request ->input('meta_title');
        $category->meta_keywords = $request ->input('meta_keywords');
        $category->meta_descrip = $request ->input('meta_description');
        $category->save();
        return redirect('/categories')->with('status',"category added succesfully");
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit' , compact('category'));
    }
    public function update(request $request ,$id)
    {
        $category = category::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }
        $category->name = $request ->input('name');
        $category->slug = $request ->input('slug');
        $category->description = $request ->input('description');
        $category->status = $request ->input('status') == true ? '1':'0';
        $category->popular = $request ->input('popular')== true ? '1':'0';
        $category->meta_title = $request ->input('meta_title');
        $category->meta_keywords = $request ->input('meta_keywords');
        $category->meta_descrip = $request ->input('meta_description');
        $category->update();
        return redirect('/categories')->with('status','category updated succesfully');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/' .$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $category->delete();
            return redirect('/categories')->with('status1','category deleted succesfully');
        }
    }


}
