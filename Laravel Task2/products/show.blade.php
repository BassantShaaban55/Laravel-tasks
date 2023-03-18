@extends('layouts.admin')
@section('content')
    <h2> Show product</h2>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="col-12">
                          <img src="{{asset('storage/'.$product->image)}}" class="product-image" alt="Product Image">
                        </div>  
                      </div>
                        <div class="col-12 col-sm-6">

                            <h3 class="my-3">{{ $product['name'] }}</h3>
                            <p>{{ $product['description'] }}
                                <hr>
                            
                            <div >
                              <h2 class="mb-0">
                                 Price after discount: {{ $product->getPrice() }}
                              </h2>
                              <h4 class="mt-0">
                                  <small>before : {{ $product['price'] }}</small>
                              </h4>
                          </div>
                   
                            
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection