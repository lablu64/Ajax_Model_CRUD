@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">page edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Page</a></li>
              <li class="breadcrumb-item active">edit Page </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
                 <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">page edit </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('page.update',$data->id) }}" method="POST">
                @csrf
                <div class="card-body">
                   
                   
                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">page_position title </label>
                   <select name="page_position" id="page_position">
                    <option value="1">line one</option>
                    <option value="2">line two</option>
                    <option value="3">line three</option>
                   </select>
                </div>

                <div class="mb-3">
                    <label for="page_title" class="form-label"> page_title </label>
                    <input name="page_title" type="text" class="form-control" value="{{ $data->page_title }}">
                </div>

                <div class="mb-3">
                    <label for="page_name" class="form-label">page_name  </label>
                    <input name="page_name" type="text" class="form-control"  value="{{ $data->page_name }}">
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">page_description title </label>
                   <textarea name="page_description" id="summernote">
                    {{ $data->page_description }}
                  </textarea> 
                </div>

               
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          
      
        <!-- /.row -->
      </div><!--/. container-fluid -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
