<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ChilCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
          //    $category = Category::all();
    //    $subcategory = SubCategory::all();
    if ($request->ajax()) {
        $data = DB::table('chil_categories')->leftJoin('categories','chil_categories.category_id','categories.id')->leftJoin('sub_categories','chil_categories.subcategory_id','sub_categories.id')->select('categories.category_name','sub_categories.subcategory_name','chil_categories.*')->get();
  
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a href="#" class="btn btn-info btn-sm edit"  data-toggle="modal" data-id="'.$row->id.'" data-target="#chailcategoryedit"><i class="fas fa-edit"></i></a> <a href="'.route('chailcategory.delete',[$row->id]) .'" class="btn btn-danger btn-sm " ><i class="fas fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
      $category = DB::table('categories')->get();


        return view('admin.category.chailcategory.index',compact('category'));
    }
    public function store(Request $request)
    {
      
    //     $validated = $request->validate([
    //         'subcategory_name' => 'required|max:55',
            
    //     ]);
    $cat = DB::table('sub_categories')->where('id',$request->subcategory_id)->first();
        $data = array();
        $data['chailcategory_name'] = $request->chailcategory_name;
        $data['category_id'] = $cat->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['slug'] = Str::of($request->chailcategory_name)->slug('-');
       DB::table('chil_categories')->insert($data);
       return redirect()->back();

    }



    public function edit($id)
    {
        
        // $category = Category::findOrFail($id);
        $category = DB::table('categories')->get();
        $data = DB::table('chil_categories')->where('id',$id)->first();
        return view('admin.category.chailcategory.index',compact('data','category'));
    }

    // public function update(Request $request )
    // {
    
    //     $id= $request->id;
      
    //     $data = array();
    //     $data['category_id'] = $request->category_id;
    //     $data['subcategory_name'] = $request->subcategory_name;
    //     $data['slug'] = Str::of($request->subcategory_name)->slug('-');
    //    DB::table('sub_categories')->where('id',$id)->update($data);

    

    // // $category=Category::where('id',$request->id)->first();
    // // $category->update([
    // //     'category_name' => $request->category_name, 
    // //     'slug' =>Str::of($request->category_name)->slug('-'),
    // // ]);   

    // return redirect()->back();

    // }

    public function destory($id)
    {
        DB::table('chil_categories')->where('id',$id)->delete();
        return redirect()->back();
    }
}
