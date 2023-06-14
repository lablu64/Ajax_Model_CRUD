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
              <form  action="{{ route('smtp.setting.update',$data->id) }}" method="POST">
                @csrf
                <div class="card-body">

                <div class="mb-3">
                    <label for="meta_keyword" class="form-label">mailer title </label>
                    <input name="mailer" type="text" class="form-control" value="{{ $data->mailer }}" placeholder=" meta_keyword title">
                </div>

                <div class="mb-3">
                    <label for="host" class="form-label">host title </label>
                    <input name="host" type="text" class="form-control" value="{{ $data->host }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="port" class="form-label">port title </label>
                    <input name="port" type="text" class="form-control" value="{{ $data->port }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">username title </label>
                    <input name="username" type="text" class="form-control" value="{{ $data->username }}" placeholder=" meta title">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">password title </label>
                    <input name="password" type="text" class="form-control" value="{{ $data->password }}" placeholder=" google_adsense title">
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
