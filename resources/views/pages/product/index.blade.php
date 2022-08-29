@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Product List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Enter Product" required>
                            </div> 
                            <div class="form-group">
                                <input class="form-control" name="price" type="text" placeholder="Enter Price" required>
                            </div> 
                        </div>
                        <div class="col-lg-4">
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>
                </div>  
                
                </form>
               
            </div>
            <div class="col-lg-12 mt-5">
                <div>
                <table class="table table-success table-stripped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Image</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($tasks as $key => $task)
                              
                          
                        <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $task->name }}</td>
                          <td>{{ $task->price }}</td>
                          <td>{{ $task->image }}</td>
                          <td>
                        
                            @if ($task->status == 0)
                                <span class="badge bg-warning">Inactive</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                    </td>
                    <td>
                        <a href="{{ route('product.delete',$task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="{{ route('product.status',$task->id) }}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-pencil" onclick="taskEditModal({{ $task->id }})"></i></a>
                    </td>

                        @endforeach
                        
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="taskEditLabel">Product Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="taskEditContent">
              
            </div>
            
          </div>
        </div>
      </div>

@endsection

@push('css')

<style>
    .page-title{
        padding-top: 5vh;
        font-size: 5rem;
        color: #4bbf68;
    }
    
</style> 
@endpush


@push('js')
<script>
    function taskEditModal(task_id){
        var data = {
            task_id: task_id,
        };
        $.ajax({
            url: "{{ route('product.edit') }}",
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                $('#taskEdit').modal('show');
                $('#taskEditContent').html(response);

               
            }
        });
    }
</script>
    
@endpush