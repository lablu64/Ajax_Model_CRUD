<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function index(){
        $page=DB::table('pages')->latest()->get();
        return view('admin.setting.page.index',compact('page'));
        
    }

    
    function create(){
       
        return view('admin.setting.page.create');
        
    }

    function edit($id){

        $data=DB::table('pages')->where('id',$id)->first();
        return view('admin.setting.page.edit',compact('data'));
        
    }
    

    public function store(Request $request) {

        $data = array();
        $data['page_position'] = $request->page_position;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['page_name'] = $request->page_name;
        $data['slug'] = Str::of($request->page_name)->slug('-');
       DB::table('pages')->insert($data);
       return redirect()->back();
        
    }

    public function pageupdate(Request $request )
    {
    
        $id= $request->id;
      
        $data = array();
        $data['page_position'] = $request->page_position;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['page_name'] = $request->page_name;
        $data['slug'] = Str::of($request->page_name)->slug('-');
      
       DB::table('pages')->where('id',$id)->update($data);

    

    // $category=Category::where('id',$request->id)->first();
    // $category->update([
    //     'category_name' => $request->category_name, 
    //     'slug' =>Str::of($request->category_name)->slug('-'),
    // ]);   

    return redirect()->back();

    }

    public function destory($id)
    {
        DB::table('pages')->where('id',$id)->delete();
        return redirect()->back();
    }
}
