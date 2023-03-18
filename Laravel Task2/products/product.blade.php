@extends('layouts.admin')
@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="width: 1500px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">products</h1>
          </div>
  
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <a class="btn btn-success" href="{{url('admin/products/create')}}">Add</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>category</th>
                  <th>price</th>
                  <th>discount</th>
                  <th>description</th>
                  <th>rating</th>
                  <th>rating_count</th>
                  <th>is_resent</th>
                  <th>is_featured</th>
                  <th>size</th>
                  <th>color</th>
                 
                  <th colspan="3">Actions</th>
                </tr>
               
              </thead>
              <tbody>
    @foreach ($products as $product)
                <tr>
                <td>{{$product['id']}}</td>
                  <td>{{$product['name']}}</td>
                  <td><img src="{{ asset('storage/' . $product['image']) }}" alt="image" width="50" height="50"/></td>
                  <td>{{$product['category']['name']}}</td>
                  <td>{{$product['price']}}</td>
                  <td>{{$product['discount']}}</td>
                  <td>{{$product['description']}}</td>
                  <td>{{$product['rating']}}</td>
                  <td>{{$product['rating_count']}}</td>
                  <td>{{$product['is_recent']}}</td>
                  <td>{{$product['is_featured']}}</td>
                  <td>{{$product['size']}}</td>
                  <td>{{$product['color']}}</td>
                </td>
                <td><a  href="{{ url('admin/products/' . $product['id']) }}" >
                  <i class="fas fa-info"></i> 
                  {{-- <i class="fa-solid fa-square-info"></i> --}}
                
                </a></td> 
                  <td scope="col">
                    <a class="btn btn-success" href="{{url('admin/products/'.$product['id'].'/edit')}}">
                    <h6 class="fa fa-pen text-white"></h6>
                    </a>
                    
                
                  <td scope="col">
                    <form action="{{url('admin/products/'.$product['id'] )}}" method="post" >
                      @method('Delete')
                      @csrf
                      <button  onclick="return confirm('Are you sure?')"class="btn btn-danger">
                        <h6 class="fa fa-trash text-white"></h6>
                      </button>
                    </form>
                  </td>
                </tr>
  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
  
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endSection