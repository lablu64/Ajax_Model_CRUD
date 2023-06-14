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
                <button type="button" class="btn btn-primary text-align-left"  data-toggle="modal" data-target="#categoryinsert">
                    +add category
                  </button>
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
                  <h3 class="card-title"> sub category all list here</h3>
                
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SL </th>
                      <th> sub category name</th>
                      <th>category name</th>
                      <th>Slug</th>
                      <th>Action </th>
                
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $row)
                            
                       
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $row->subcategory_name }}</td>
                      <td>{{ $row->category_name }}</td>
                      <td>{{ $row->slug }}</td>
                      <td>
                        <a href="#" class="btn btn-info btn-sm edit" data-id={{ $row->id }} data-toggle="modal" data-target="#categoryedit"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('subcategory.delete',$row->id) }}" class="btn btn-danger btn-sm delete-comform" ><i class="fas fa-trash"></i></a>
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

{{-- 
      category insert model start here --}}

      <div class="modal fade" id="categoryinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">sub Cateogory Create </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('subcategory.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">category name </label>
                      <select class="form-control" name="category_id" id="">
                        @foreach ($category as $row )
                            
                       
                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>

                        @endforeach
                      </select>
                      <label for="exampleInputEmail1">sub category name </label>
                      <input type="category_name" name="subcategory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter sub category name">
                      
                    </div>
                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit </button>
            </div>
                </form>
          </div>
        </div>
      </div>

{{-- 
      category edit model start here --}}

      <div class="modal fade" id="categoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">sub Cateogory Edit </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @include('admin.category.subcategory.edit')
              
          </div>
        </div>
      </div>
    

    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript">
      // $('body').on('click','.edit', function(){

      //   let cat_id =$(this).data(id);
      //   alert(cat_id);

      // });

  //      $('body').on('click', '.edit', function(){
  //     let $cat_id = $(this).data('id');
  //     console.log($cat_id);
    
  //  });
  $(function () {
  $('body').on('click', '.edit', function () {
      let subcat_id = $(this).data('id');
      // alert(cat_id);

      $.get( "subcategory/edit/"+subcat_id , function (data) {
        //  console.log(data);
          // $('#modelHeading').html("Edit Product");
          // $("#model_body").html(data);
           $('#e_subcategory_name').val(data.subcategory_name);
           $('#e_subcategory_id').val(data.id);
          // $('#ajaxModel').modal('show');
          // $('#product_id').val(data.id);
          // $('#name').val(data.name);
          // $('#detail').val(data.detail);
      });
    });

  });
      
      </script>

@endsection
