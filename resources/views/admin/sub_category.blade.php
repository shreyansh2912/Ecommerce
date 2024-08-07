@extends('layouts.admin')
@section('admin')
@if (session('message')=='Added Successfully')
<div class="alert alert-success" role="alert">
  {{session('message')}}
</div>
@elseif (session('message')=='Deleted Successfully')
<div class="alert alert-danger" role="alert">
  {{session('message')}}
</div>
@endif
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        {{-- <h4 class="card-title">Inline forms</h4> --}}
        {{-- <p class="card-description">
          Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row
        </p> --}}
        <form class="form-inline" method="POST">
          @csrf
          <label class="sr-only" for="inlineFormInputName2">Category</label>
          <input 
          @error('name')
          style="border-color:red; " 
          @enderror
          type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="name" placeholder="Cloths,Shoes" value="{{old('name')}}">
          <span style="color: red;">
            @error('name')
              {{$message}}
            @enderror
          </span><br>
          {{-- <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label> --}}
          {{-- <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
          </div> --}}
          {{-- <div class="form-check mx-sm-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" checked>
              Remember me
            </label>
          </div> --}}
          <button type="submit" class="btn btn-primary mb-2">ADD</button>
        </form>
      </div>
    </div>
  </div>
  <div class="table-responsive pt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Name
          </th>
          <th>
            Created At
          </th>
          <th>
            Updated At
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
@foreach ($Subcategory as $value)
        <tr class="table-primary">
          <td>
            {{$value->id}}
          </td>
          <td>
            {{$value->name}}
          </td>
          <td>
            {{$value->created_at}}
          </td>
          <td>
            {{$value->updated_at}}
          </td>
          <td>
            <form action="category/{{$value->id}}" method="post">
              @csrf
              @method('put')
            <button  class="btn btn-success">Update</button>
              @method('delete')
              {{-- <a href="category/{{$value->id}}"> --}}
                <button class="btn btn-danger">Delete</button>
              </a>
            </td>
          </form>
        </tr>
@endforeach
</tbody>
</table>
</div>
<div class="page" style="margin-top: 10px">
    {{$Subcategory->links()}}
</div>
@endsection