@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v12</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('page.create') }}" class="btn btn-primary text-align-left" >
                    +add page
                  </a>
            </ol>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">page all list here</h3>
                
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL </th>
                      <th>page title</th>
                      <th>page name</th>
                     
                      <th>Action </th>
                
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($page as $item)
                            
                       
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $item->page_title }}</td>
                      <td>{{ $item->page_name }}</td>
                      <td>
                        <a href="{{ route('page.edit',$item->id) }}" class="btn btn-info btn-sm edit" ><i class="fas fa-edit"></i></a>
                        <a href="{{ route('page.delete',$item->id) }}" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                      </td>
                      
                    </tr>
                    @endforeach
                  
                    </tbody>
                  
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->


@endsection
