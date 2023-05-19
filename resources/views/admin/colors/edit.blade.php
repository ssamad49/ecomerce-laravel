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
                <h3 class="p-2">Edit color
                    <a href="{{url('admin/colors')}}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="mb-2">Color Name</label>
                        <input type="text" name="name" value="{{$color->name}}" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Color Code</label>
                        <input type="text" name="code"  value="{{$color->code}}" class="form-control">
                        @error('code') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Status</label><br>
                        <input type="checkbox" name="status" {{$color->status == '1' ?'checked':'' }} style="width:20px;height:20px"/>
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
