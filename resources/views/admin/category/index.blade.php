@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Categories<a class="btn bg-gradient-success m-1" href="{{url('add-category')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;ADD NEW CATEGORY</a></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keyword</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Category as $Category)
                                <tr>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{$Category->id}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{asset($Category->thumbnail)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$Category->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$Category->slug}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$Category->description}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$Category->meta_keyword}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($Category->status == '1')
                                        <span class="badge badge-sm bg-gradient-success">Active</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-secondary">Disable</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$Category->created_at}}</span>
                                    </td>
                                    <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs edit-link" data-bs-toggle="modal" data-bs-target="#modal-form" data-original-title="Edit category"
                                    data-id="{{$Category->id}}" data-name="{{$Category->name}}" data-slug="{{$Category->slug}}" data-description="{{$Category->description}}"
                                    data-status="{{$Category->status}}" data-popular="{{$Category->popular}}" data-meta_title="{{$Category->meta_title}}"
                                    data-meta_keyword="{{$Category->meta_keyword}}" data-meta_description="{{$Category->meta_description}}" data-image="{{$Category->image}}">
                                    <i class="material-icons text-sm">edit</i>Edit
                                    </a>
                                        &nbsp;&nbsp;
                                        <a href="javascript:;" class="delete-btn text-secondary font-weight-bold text-xs" data-id="{{ $Category->id }}" data-toggle="tooltip" data-original-title="Delete category">
                                            <i class="material-icons text-sm">delete</i>Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">Edit Category</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('update-category')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="cat_id" id="cat_id">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 input-group-dynamic is-filled">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" id="name" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <textarea class="form-control" rows="3" placeholder="Description..." name="description" id="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="status" id="status">
                                        <label class="custom-control-label" for="status">Status</label>
                                    </div>
                                    <div class="col-md-6 mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="popular" id="popular">
                                        <label class="custom-control-label" for="popular">Popular</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" id="meta_title" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <label for="meta_keyword" class="form-label">Meta keyword</label>
                                            <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <textarea class="form-control" rows="3" name="meta_description" placeholder="Description..." id="meta_description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group  mb-3 input-group-dynamic is-filled">
                                            <input type="file" name="image" id="image" class="form-control" >
                                            <img id="category-image" src="" alt="Category Image" style="max-width: 100px; max-height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn bg-gradient-primary mb-0"><i class="material-icons text-sm">update</i>&nbsp;&nbsp;Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('.delete-btn').click(function(event) {
        event.preventDefault(); // Prevent the default link behavior

        var categoryId = $(this).data('id');
        var $deleteBtn = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the category
                $.ajax({
                    type: 'POST', // Use POST method
                    url: "{{ url('delete-category') }}/" + categoryId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE', // Specify DELETE method
                    },
                    success: function(response) {
                        if (response.success) {
                            // Display a success message
                            Swal.fire(
                                'Deleted!',
                                'Your category has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload(true); // Reload the page after the OK button is clicked
                            });
                            // You can also remove the category from the UI if needed
                            // e.g., $(this).closest('tr').remove();
                        } else {
                            // Handle the case where deletion failed
                            Swal.fire(
                                'Error',
                                'Category deletion failed.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        // Handle AJAX error
                        Swal.fire(
                            'Error',
                            'An error occurred while deleting the category.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    $('.edit-link').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var slug = $(this).data('slug');
        var description = $(this).data('description');
        var status = $(this).data('status');
        var popular = $(this).data('popular');
        var metaTitle = $(this).data('meta_title');
        var metaKeyword = $(this).data('meta_keyword');
        var metaDescrip = $(this).data('meta_description');
        var image = $(this).data('image');

        // Set values in the modal form fields
        $('#cat_id').val(id);
        $('#name').val(name);
        $('#slug').val(slug);
        $('#description').val(description);
        $('#status').prop('checked', status);
        $('#popular').prop('checked', popular);
        $('#meta_title').val(metaTitle);
        $('#meta_keyword').val(metaKeyword);
        $('#meta_description').val(metaDescrip);
        if (image) {
            $('#category-image').attr('src', 'http://127.0.0.1:8000/assets/uploads/category/'+image);
        }else {
            $('#category-image').attr('src', '');
        }

        // Update the form action attribute if needed
        // $('#modal-form form').attr('action', '/update-category/' + id);
    });

    // Handle image selection
    $('#image').on('change', function() {
        var selectedImage = $(this)[0].files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#category-image').attr('src', e.target.result);
            $('#category-image').css('display', 'block');
        };

        reader.readAsDataURL(selectedImage);
    });
});
</script>

@endsection