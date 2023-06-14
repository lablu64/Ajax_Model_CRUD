<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BrandCategory;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;


class BrandController extends Controller
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
        $data = DB::table('brand_categories')->get();
  
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a href="#" class="btn btn-info btn-sm edit"  data-toggle="modal" data-id="'.$row->id.'" data-target="#chailcategoryedit"><i class="fas fa-edit"></i></a> <a href="'.route('brand.delete',[$row->id]) .'" class="btn btn-danger btn-sm " ><i class="fas fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
      


        return view('admin.category.brand.index');
    }
    public function store(Request $request)
    {
      
    //     $validated = $request->validate([
    //         'subcategory_name' => 'required|max:55',
            
    //     ]);
         $slugs=Str::of($request->brand_name)->slug('-');
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['slug'] = Str::of($request->brand_name)->slug('-');

        if($request->file('brand_logo')){
            $photo=$request->brand_logo;
            $photoname=$slugs.'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/brands/',$photoname);


        }
        $data['brand_logo'] = 'public/files/brands/'.$photoname;
       DB::table('brand_categories')->insert($data);
       return redirect()->back();

    }


    
    public function edit($id)
    {
        
        // $category = Category::findOrFail($id);
      
        // $brandss = DB::table('brand_categories')->where('id',$id)->first();
        $brandss=BrandCategory::findOrFail($id);
        return view('admin.category.brand.index',compact('brandss'));
    }


    public function destory($id)
    {
        $data=DB::table('brand_categories')->where('id',$id)->first();

        $image= $data->brand_logo;
        if(File::exists($image)){
          unlink($image);
        }
       
        DB::table('brand_categories')->where('id',$id)->delete();
        return redirect()->back();
    }


}
