
@extends('layouts.admin')
@section ('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <h2>Add product</h2>
  
<form method="POST" action="{{url('admin/products')}}"enctype="multipart/form-data">
    @csrf
    <label>Name</label>
    <input class="form-control" name="name" value="{{old('name')}}">
    
    @error('name')  
    <div class="alert-alert-dangers">{{$message}}</div>   
    @enderror

    <label>Image</label>
    <input  name="image" type="file" value="{{ old('image') }}" />
  
<br>
    <label>price</label>
    <input class="form-control" name="price" value="{{old('price')}}">
    @error('price')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>discount</label>
    <input class="form-control" name="discount" value="{{old('discount')}}">
    @error('discount')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>description</label>
    <input class="form-control" name="description" value="{{old('description')}}">
    @error('description')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>rating</label>
    <input class="form-control" name="rating" value="{{old('rating')}}">
    @error('rating')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>rating_count</label>
    <input class="form-control" name="rating_count" value="{{old('rating_count')}}">
    @error('rating_count')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>size</label>
    <input class="form-control" name="size" value="{{old('size')}}">
    <label>color</label>
    <input class="form-control" name="color" value="{{old('color')}}">
   
    <label>Category</label>
    <select class="form-control" name="category_id">
        <option>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="is_featured"
            id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">product is featured</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="is_recent" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">product is recent</label>
    </div>
    <button class="btn btn-primary">add</button>
    <a class="btn btn-secondary" href="{{url('admin/products')}}"> cancel</a>

</form>
            </div>
          </div>
        </div>
    </section>
</div>
    
@endSection








