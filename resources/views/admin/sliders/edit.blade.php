@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
           {{session('message')}}
        </div>
       @endif
        <div class="card">
            <div class="card-header">
                <h3 class="p-2">Update Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="mb-2">Title</label>
                        <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                        @error('title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Description</label>
                        <textarea type="text" name="description" class="form-control" rows="3">{{$slider->title}}</textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Image</label>
                        <input type="file" name="image" class="form-control">
                        <img class="mt-2" src="{{asset('uploads/sliders/'.$slider->image)}}" style="width:120px " alt="">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Status</label><br>
                        <input type="checkbox" name="status"{{$slider->status == 1 ? 'checked':''}} style="width:20px;height:20px"/>
                    </div>
                    <div class="my-4">
                       <button class="btn btn-sm btn-primary" type="submit" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
