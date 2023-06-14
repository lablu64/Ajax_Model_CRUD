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
              <li class="breadcrumb-item"><a href="#">Seo</a></li>
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
                <h3 class="card-title">Seo Setting  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('seo.setting.update',$data->id) }}" method="POST">
                @csrf
                <div class="card-body">
                   
                   
                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label">Meta title </label>
                    <input name="meta_title" type="text" class="form-control" value="{{ $data->meta_title }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="oldPasswordInput" class="form-label"> meta_author </label>
                    <input name="meta_author" type="text" class="form-control" value="{{ $data->meta_author }}" placeholder=" meta_author ">
                </div>

                <div class="mb-3">
                    <label for="meta_tag" class="form-label">meta_tag  </label>
                    <input name="meta_tag" type="text" class="form-control" value="{{ $data->meta_tag }}" placeholder="  meta_tag">
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">meta_description title </label>
                   <textarea name="meta_description" id="meta_description" cols="30" rows="10">{{ $data->meta_description }}</textarea>
                   
                </div>

                <div class="mb-3">
                    <label for="meta_keyword" class="form-label">meta_keyword title </label>
                    <input name="meta_keyword" type="text" class="form-control" value="{{ $data->meta_keyword }}" placeholder=" meta_keyword title">
                </div>

                <div class="mb-3">
                    <label for="google_verification" class="form-label">google_verification title </label>
                    <input name="google_verification" type="text" class="form-control" value="{{ $data->google_verification }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="google_analytics" class="form-label">google_analytics title </label>
                    <input name="google_analytics" type="text" class="form-control" value="{{ $data->google_analytics }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="alexa_verification" class="form-label">alexa_verification title </label>
                    <input name="alexa_verification" type="text" class="form-control" value="{{ $data->alexa_verification }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="google_adsense" class="form-label">google_adsense title </label>
                    <input name="google_adsense" type="text" class="form-control" value="{{ $data->google_adsense }}" placeholder=" google_adsense title">
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
