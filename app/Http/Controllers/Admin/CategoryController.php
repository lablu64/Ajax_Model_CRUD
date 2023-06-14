<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('categories')->get();
        return view('admin.category.category.index',compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
            
        ]);
     
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['slug'] = Str::of($request->category_name)->slug('-');
       DB::table('categories')->insert($data);
       return redirect()->back();

    }
    public function edit($id)
    {
        
        // $category = Category::findOrFail($id);
        $data = DB::table('categories')->where('id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request )
    {
    
        $id= $request->id;
      
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['slug'] = Str::of($request->category_name)->slug('-');
       DB::table('categories')->where('id',$id)->update($data);

    

    // $category=Category::where('id',$request->id)->first();
    // $category->update([
    //     'category_name' => $request->category_name, 
    //     'slug' =>Str::of($request->category_name)->slug('-'),
    // ]);   

    return redirect()->back();

    }

    public function destory($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back();
    }
}
