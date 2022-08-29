<form action="{{ route('product.update', $task->id) }}" method="post" enctype="multipart/form">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="name" value="{{ $task->name }}" type="text" placeholder="Enter Product" required>
            </div> 
            <div class="form-group">
                <input class="form-control" name="price" value="{{ $task->price }}" type="text" placeholder="Enter Price" required>
            </div> 
        </div>
        <div class="col-lg-4">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>  

</form>