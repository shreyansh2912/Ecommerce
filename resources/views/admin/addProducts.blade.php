@extends('layouts.admin')

@section('admin')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>
        <p class="card-description">
          Add products
        </p>
        <form class="forms-sample" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
            <span class="err">
              @error('product_name')
              {{"*".$message}}
              @enderror
            </span>
          </div>
          {{-- <div class="form-group"> --}}
            <label for="exampleInputEmail3">Price</label>
            <div class="form-group " style="width: 350px">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white">$</span>
                  </div>
                  <input type="text" name="price" value="{{old('price')}}" class="form-control" aria-label="Amount (to the nearest dollar)">
                  {{-- <div class="input-group-append">
                    <span class="input-group-text bg-primary text-white">.00</span>
                  </div> --}}
                </div>
                <span class="err">
                  @error('price')
              {{"*".$message}}
                  @enderror
                </span>
            </div>
          {{-- </div> --}}
          {{-- <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
          </div> --}}
          <div class="form-group">
            <label for="exampleSelectGender">Category</label>
              <select class="form-control" name="category" id="exampleSelectGender">
                 
              </select>
            </div>
          <div class="form-group">
            <label for="exampleSelectGender">Sub Category</label>
              <select class="form-control" name="subCategory" id="Subcategory">
                
              </select>
            </div>
          <div class="form-group" style="position: relative">
            <label class="w-100" for="image">Image Upload  <br><br>
            <input type="file" name="image" height="500px " class="file-upload">
            <div class="input-group col-xs-12">
              {{-- <input type="text" class="form-control  file-upload-info" disabled placeholder="Upload Image"> --}}
            </label>
            </div>
            <span class="err">
              @error('image')
              {{"*".$message}}
              @enderror
            </span>
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputCity1">City</label>
            <input type="text" name="" class="form-control" id="exampleInputCity1" placeholder="Location">
          </div> --}}
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleTextarea1"value="{{old('description')}}" rows="4"></textarea>
            <span class="err">
              @error('description')
              {{"*".$message}}
              @enderror
            </span>
          </div>
          <div class="form-check form-check-primary">
            <label class="form-check-label">
              <input type="checkbox" checked name="visible" class="form-check-input" name="visible">
              Visible
            </label>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
<script src="{{asset('assets/web/js/jquery-3.3.1.min.js')}}"></script>

  <script>
    $(document).ready(()=>{
      let data = "";
      let tag = document.getElementById("exampleSelectGender")
      console.log(tag);
      let tag2 = document.getElementById("Subcategory")

      $.ajax({
        url:"http://127.0.0.1:8000/show",
        type:"GET",
        success:(res)=>{
          for (let i = 0; i < res.length; i++) {
            data += `
                <option value = "${res[i].id}">${res[i].name}</option>
            `
          } 
          tag.innerHTML = data;
          console.log(data);
        }
      })
      $.ajax({
        url:"http://127.0.0.1:8000/show_Sub",
        type:"GET",
        success:(res)=>{
          data= "";
          for (let i = 0; i < res.length; i++) {
            data += `
                <option value = "${res[i].id}">${res[i].name}</option>
            `
          } 
          tag2.innerHTML = data;
        }
      })
    }
  )
  
  </script>
@endsection