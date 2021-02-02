<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{
    //
    public function index()
    {
    	return view('admin.category.add-category');
    }

    public function saveCategory(Request $request)
    {
    	$category = new Category();
    	$category->add_category          = $request->catagory_name;
    	$category->category_description  = $request->category_description;
    	$category->publication_status    = $request->publication_status;

        $category_image                  = $request->file('category_image');
        $imageName                       = $category_image->getClientOriginalName();
        $category_image->move(public_path('category-images/'),$imageName);
        $category->category_image        = $imageName;
    	$category->save();
    	//Another Methods
    	//Category::create($request->all());
        /*DB::table('categories')->insert([
             add_category          => $request->catagory_name,
             category_description  => $request->category_description,
             publication_status    => $request->publication_status
        ]);*/
        //return redirect('/category/add')with('message','Category Save Successfully');
    	return redirect()->back()->with('message','Category Save Successfully');
    }

    public function manageCategory()
    {
    	$categories = Category::all();
    	return view('admin.category.manage-category',compact($categories,'categories'));
    }

    public function unpublishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect('/category/manage');
    }

    public function publishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/category/manage');
    }


     public function editCategory($id)
    {
        //echo "Hello";
        $category = Category::find($id);
        return view('admin.category.edit-category',compact($category,'category'));
    }


    public function updateCategory(Request $request,$id)
    {
        $category = Category::find($request->id);
        $category->add_category          = $request->catagory_name;
        $category->category_description  = $request->category_description;
        $category->publication_status    = $request->publication_status;

        

        if($request->hasfile('category_image')){

               $old_image = $request->oldImage;

               $category_image                    = $request->file('category_image');
               $imageName                         = $category_image->getClientOriginalName();
               $category_image->move(public_path('category-images/'),$imageName);
               $category->category_image          = $imageName;
               unlink(public_path('category-images/').$old_image);
            }

        $category->save();
        return redirect('/category/manage')->with('message','Category Edit Successfully');
    }

     public function deleteCategory($id)
    {
        
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message','Category Delete Successfully');
    }


}
