

  <form action="{{ route('subcategory.update') }}" method="POST">
    @csrf

        <div class="form-group">
          <label for="exampleInputEmail1">category name </label>
          <select class="form-control" name="category_id" id="">
            @foreach ($category as $row )
                
           
            <option value="{{ $row->id }} ">{{ $row->category_name }}</option>

            @endforeach
          </select>
          
    

          <label for="exampleInputEmail1">subcategory name </label>
          <input type="text" name="subcategory_name" class="form-control" id="e_subcategory_name" aria-describedby="emailHelp"  >
          <input type="hidden" name="id" class="form-control" id="e_subcategory_id" aria-describedby="emailHelp" >
          </div>
    
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit </button>
        </div>
 </form>