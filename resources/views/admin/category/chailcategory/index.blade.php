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
                <button type="button" class="btn btn-primary text-align-left"  data-toggle="modal" data-target="#chailcategoryinsert">
                    +add chailcategory
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
                  <h3 class="card-title">chail category all list here</h3>
                
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table id="" class="table table-bordered table-striped ytable">
                    <thead>
                    <tr>
                      <th>SL </th>
                      <th>category name</th>
                      <th>sub category name</th>
                      <th>chail category name</th>
                      <th>Slug</th>
                      <th>Action </th>
                
                    </tr>
                    </thead>
                    <tbody>
                     
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

      <div class="modal fade" id="chailcategoryinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chail Cateogory Create </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('chailcategory.store') }}" method="POST" id="add-form">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">category /subcategory name </label>
                  <select class="form-control" name="subcategory_id" id="">
                    @foreach ($category as $row )
                        
                   
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>

                    @php
                      $subcat = DB::table('sub_categories')->where('category_id',$row->id)->get();
                    @endphp
                    @foreach ($subcat as $row )

                    <option value="{{ $row->id }}">-------{{ $row->subcategory_name }}</option>
                      
                    @endforeach

                    @endforeach
                  </select>
                  <label for="exampleInputEmail1">chailden category name </label>
                  <input type="text" name="chailcategory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter childen category name">
                  
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><span>load----</span> Submit </button>
            </div>
                </form>
          </div>
        </div>
      </div>

{{-- 
      category edit model start here --}}

      <div class="modal fade" id="chailcategoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">chailden Cateogory Edit </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('category.update') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="id" id="id">
                  <label for="exampleInputEmail1">category /subcategory name </label>
                  <select class="form-control" name="subcategory_id" id="">
                    @foreach ($category as $row )
                        
                   
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>

                    @php
                      $subcat = DB::table('sub_categories')->where('category_id',$row->id)->get();
                    @endphp
                    @foreach ($subcat as $row )

                    <option value="{{ $row->id }}">---{{ $row->subcategory_name }}</option>
                      
                    @endforeach

                    @endforeach
                  </select>
                  <label for="exampleInputEmail1">chailden category name </label>
                  <input type="text" name="chailcategory_name" class="form-control" id="e_chailcategory_name" aria-describedby="emailHelp"  >
                  
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
      <script type="text/javascript">
        $(function chailcategory () {
          var table = $('.ytable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('chailcategory.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'category_name', name: 'category_name'},
                  {data: 'subcategory_name', name: 'subcategory_name'},
                  {data: 'chailcategory_name', name: 'chailcategory_name'},
                  {data: 'slug', name: 'slug'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
              ]
          });
        });


      
      </script>

<script type="text/javascript">

$(function () {
$('body').on('click', '.edit', function () {
  let id = $(this).data('id');
  // alert(cat_id);

  $.get( "chailcategory/edit/"+id , function (data) {
   
 
      // $('#e_chailcategory_name').val(data.chailcategory_name);
       $('#id').val(data.id); 
  });
});

});
  
  </script>

@endsection
