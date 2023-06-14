@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">web</a></li>
              <li class="breadcrumb-item active">One Page </li>
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
                <h3 class="card-title">web Setting  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('web.setting.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   
                   
                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">currency title </label>
                    <select name="currency" class="form-control" id="currency">
                        <option value="$" {{ $data->currency == '$'? 'selected':' ' }}>USD</option>
                        <option value="৳"{{ $data->currency == '৳'? 'selected':' ' }}>TAKA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone_one" class="form-label"> phone_one </label>
                    <input name="phone_one" type="text" class="form-control" value="{{ $data->phone_one }}" placeholder=" phone_one ">
                </div>

                <div class="mb-3">
                    <label for="phone_two" class="form-label">phone_two  </label>
                    <input name="phone_two" type="text" class="form-control" value="{{ $data->phone_two }}" placeholder="  phone_two">
                </div>

                <div class="mb-3">
                    <label for="mail_email" class="form-label">mail_email title </label>
                   <textarea name="mail_email" id="mail_email" cols="30" rows="10">{{ $data->mail_email }}</textarea>
                   
                </div>

                <div class="mb-3">
                    <label for="support_email" class="form-label">support_email title </label>
                    <input name="support_email" type="text" class="form-control" value="{{ $data->support_email }}" placeholder=" meta_keyword title">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">address title </label>
                    <input name="address" type="text" class="form-control" value="{{ $data->address }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">facebook title </label>
                    <input name="facebook" type="text" class="form-control" value="{{ $data->facebook }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">instagram title </label>
                    <input name="instagram" type="text" class="form-control" value="{{ $data->instagram }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="linkin" class="form-label">linkin title </label>
                    <input name="linkin" type="text" class="form-control" value="{{ $data->linkin }}" placeholder=" google_adsense title">
                </div>
                <div class="mb-3">
                    <label for="youtube" class="form-label">youtube title </label>
                    <input name="youtube" type="text" class="form-control" value="{{ $data->youtube }}" placeholder=" youtube title">
                </div>
                <div class="mb-3">
                    <label for="twitter" class="form-label">twitter title </label>
                    <input name="twitter" type="text" class="form-control" value="{{ $data->twitter }}" placeholder=" twitter title">
                </div>
                <div class="mb-3">
                    <label for="youtube" class="form-label">logo title </label>
                    <input type="file" class="form-control" name="logo" id="logo">
                    <input type="hidden" class="form-control" name="old_logo" id="old_logo" value="{{ $data->logo }}">  
               
                </div>
                <div class="mb-3">
                    <label for="youtube" class="form-label">favicon title </label>
                    <input type="file" class="form-control" name="favicon" id="favicon"> 
                    <input type="hidden" class="form-control" name="old_favicon" id="old_favicon" value="{{ $data->favicon }}">  
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
