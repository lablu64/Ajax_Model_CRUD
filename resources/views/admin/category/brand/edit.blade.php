
@php
 
@endphp


<form action="{{ route('brand.update') }}" method="POST" enctype="multipart/form-data" id="add-form">
  @csrf
  <div class="form-group">
   
    <label for="exampleInputEmail1">brand name </label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    <label for="exampleInputEmail1">brand logo </label>
    <input type="file" class="dropify" name="brand_logo" id="input-file-new" />
  </div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit </button>
</div>
  </form>