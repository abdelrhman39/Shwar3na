<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Manage\BaseController;
use App\Models\Category;
use App\Models\SubCategory;
use carbon\carbon;

class CategoryController extends Controller
{
    public function category_page(){
        
        $categories = Category::Selection()->get();

        return view('dashboard.category.show',  ['categories' => $categories]);
    }

    public function edit($category_id){
        //get specific categories and its translations
        $mainCategory = Category::selection()
                                    ->find($category_id);

        if (!$mainCategory)
            return redirect()->route('admin.Categories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.category.edit', ['mainCategory' => $mainCategory]);
    }


    public function update($category_id, CategoryRequest $request){
        
        $data = Category::where('id', $category_id)->first();

        $image = $request->file('image') ? BaseController::saveImage("category" , $request->file('image')) : $data->image;

        $updateCat = Category::where('id', $category_id)->update([
                                                                "name" => $request->name,
                                                                "image" =>  $image,
                                                                ]);

        return redirect()->route('admin.Categories')->with(['success' => "تم تعديل القسم بنجاح"]);
    }


    public function destroy($category_id){

        $data = Category::where('id', $category_id)->first();

        BaseController::deleteFile("category" , $data->image);
       
        $delete = Category::where('id', $category_id)->delete();
      
        return redirect()->route('admin.Categories')->with(['success' => "تم حزف القسم بنجاح"]);

    }

    public function newCategory (){
        return view('dashboard.category.add');
    }


    public function add_category(CategoryRequest $request){
        
        if( $request->has('image') && $request->image != null){
            $add = new Category;
            $add->name = $request->name;
            $add->image = $request->file('image') ? BaseController::saveImage("category" , $request->file('image')) : null;
            $add->save();
        
            return redirect()->route('admin.Categories')->with(['success' => "تم أضافة القسم بنجاح"]);
        }else{
            return redirect()->route('admin.Categories.new')->with(['error' => "صورة القسم مطلوبة"]);
        }
    }

    public function subcategory_page($category_id){
        
        $subcategories = SubCategory::Selection()->where('category_id',  $category_id)->get();

        $category_name = Category::where('id',  $category_id)->value('name');
        
        return view('dashboard.category.subcategory',  [ 'category_id' => $category_id , 'category_name' => $category_name,'subcategories' => $subcategories]);
    }


    public function subcategory_Edit($sub_id){
        //get specific categories and its translations
        $subCategorys = SubCategory::selection()->find($sub_id);

        if (!$subCategorys)
            return redirect()->route('admin.Categories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.category.editSub', ['subCategorys' => $subCategorys]);
    }


    public function subcategory_update($sub_id, CategoryRequest $request){
        
        $data = SubCategory::where('id', $sub_id)->first();


        $updateCat = SubCategory::where('id', $sub_id)->update([ "name" => $request->name]);

        return redirect()->route('admin.subcategory',$data->category_id)->with(['success' => "تم تعديل القسم بنجاح"]);
    }


    public function newSubcategory ($category_id){
        return view('dashboard.category.addSub', ['category_id' => $category_id]);
    }


    public function add_subCategory($category_id , CategoryRequest $request){
        
        $add = new SubCategory;
        $add->name = $request->name;
        $add->category_id = $category_id;
        $add->indexOf = 0;
        $add->save();

        return redirect()->route('admin.subcategory', $category_id)->with(['success' => "تم أضافة القسم بنجاح"]);

    }


    public function destroy_subcategory($sub_id){
       
        $category_id = SubCategory::where('id', $sub_id)->value('category_id');
        $delete = SubCategory::where('id', $sub_id)->delete();
      
        return redirect()->route('admin.subcategory', $category_id)->with(['success' => "تم حزف القسم بنجاح"]);

    }

}
