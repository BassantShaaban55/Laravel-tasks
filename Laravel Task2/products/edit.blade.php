
@extends('layouts.admin')
@section ('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <h2>Edit product</h2>
  
<form method="POST" action="{{url('admin/products',$product->id)}}"enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Name</label>
    <input class="form-control" name="name" value="{{old('name',$product->name)}}">
    @error('name')
     <div class="alert-alert-dangers">{{$message}}</div>   
    @enderror
    <label>Image</label>
    <input  name="image" type="file" value="{{ old('image') }}" />
    @error('image')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
   <br>
   <label>price</label>
    <input class="form-control" name="price" value="{{old('price',$product->price)}}">
   
    <label>discount</label>
    <input class="form-control" name="discount" value="{{old('discount',$product->discount)}}">
    @error('discount')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>description</label>
    <input class="form-control" name="description" value="{{old('discription',$product->description)}}">
    @error('description')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>rating</label>
    <input class="form-control" name="rating" value="{{old('rating',$product->rating)}}">
    @error('rating')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>rating_count</label>
    <input class="form-control" name="rating_count" value="{{old('rating_count',$product->rating_count)}}">
    @error('rating_count')
    <div class="alert-alert-dangers">{{$message}}</div>   
   @enderror
    <label>size</label>
    <input class="form-control" name="size" value="{{old('size',$product->size)}}">
    <label>color</label>
    <input class="form-control" name="color" value="{{old('color',$product->color)}}">
    
 
    <label>Category</label>
    <select class="form-control" name="category_id">
        <option>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label>the product is recent ?</label>
        <select class="form-control" name="is_recent" value={{old('is_recent',$product->is_recent)}}>

                <option  value="1"
                    {{ old('is_recent',$product->is_recent) == "1" ? 'selected' : '' }}>yes
                </option>
                <option value="0"
                    {{ old('is_recent',$product->is_recent) == "0" ? 'selected' : '' }}>no
                </option>
          
        </select>
    </div>
    <div class="form-group">
        <label>the product is featured ?</label>
        <select class="form-control" name="is_featured" value={{old('is_featured',$product->is_featured)}}>

                <option  value="1"
                    {{ old('is_featured',$product->is_featured) == "1" ? 'selected' : '' }}>yes
                </option>
                <option value="0"
                    {{ old('is_featured',$product->is_featured) == "0" ? 'selected' : '' }}>no
                </option>
          
        </select>
    </div>
    <button class="btn btn-primary">Edit</button>
    <a class="btn btn-secondary" href="{{url('admin/products')}}"> cancel</a>

</form>
            </div>
          </div>
        </div>
    </section>
</div>
    
@endSection








