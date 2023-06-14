<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('sub_categories')->leftJoin('categories','sub_categories.category_id','categories.id')->select('sub_categories.*','categories.category_name')->get();
       $category = Category::all();
        return view('admin.category.subcategory.index',compact('data','category'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
            
        ]);
     
        $data = array();
        $data['subcategory_name'] = $request->subcategory_name;
        $data['category_id'] = $request->category_id;
        $data['slug'] = Str::of($request->subcategory_name)->slug('-');
       DB::table('sub_categories')->insert($data);
       return redirect()->back();

    }



    public function edit($id)
    {
        
        // $category = Category::findOrFail($id);
        $data = DB::table('sub_categories')->where('id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request )
    {
    
        $id= $request->id;
      
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['slug'] = Str::of($request->subcategory_name)->slug('-');
       DB::table('sub_categories')->where('id',$id)->update($data);

    

    // $category=Category::where('id',$request->id)->first();
    // $category->update([
    //     'category_name' => $request->category_name, 
    //     'slug' =>Str::of($request->category_name)->slug('-'),
    // ]);   

    return redirect()->back();

    }

    public function destory($id)
    {
        DB::table('sub_categories')->where('id',$id)->delete();
        return redirect()->back();
    }

}
