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
                <button type="button" class="btn btn-primary text-align-left"  data-toggle="modal" data-target="#brandcategoryinsert">
                    +add new brand
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
                  <h3 class="card-title">brands  all list here</h3>
                
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table id="" class="table table-bordered table-striped ytable">
                    <thead>
                    <tr>
                      <th>SL </th>
                      <th>brand name</th>
                      <th>logo/th>
                     
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

      <div class="modal fade" id="brandcategoryinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chail Cateogory Create </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                @csrf
                <div class="form-group">
                 
                  <label for="exampleInputEmail1">brand name </label>
                  <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter brand  name">
                  <label for="exampleInputEmail1">brand logo </label>
                  <input type="file" class="dropify" name="brand_logo" id="input-file-new" />
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

      <div class="modal fade" id="chailcategoryedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">chailden Cateogory Edit </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modelbrand">

              @include('admin.category.brand.edit')
             
          </div>
        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript">
        $(function chailcategory () {
          var table = $('.ytable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('brand.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'brand_name', name: 'brand_name'},
                  {data: 'brand_logo', name: 'brand_logo',render:function(data,type,full,meta){
                    return "<img src=\"" + data + "\" height=\"50\"/>";

                  }},
                 
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

  $.get( "brand/edit/"+id , function (data) {
   
    // $('#modelbrand').html(data);
      $('#e_chailcategory_name').val(data.chailcategory_name);
       $('#id').val(data.id); 
  });
});

});
  
  </script>

  <script>
    $('.dropify').dropify({
    messages: {
        'default': '',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
  </script>

@endsection
