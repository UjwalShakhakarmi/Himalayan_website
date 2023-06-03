@extends('layouts.MainPageLayout')
@section('content')
  <!-- Page Content -->
  <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>Products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid" style="position:relative">
                  @foreach($product as $pro)
                    <div class="col-lg-3 col-md-3 all des">
                      <div class="product-item">
                        <a href="#"><img src="{{asset('storage/img/'.$pro->ProductImg)}}" alt="" style="height:100px ; width:100%; overflow:hidden;"></a>
                        <div class="down-content">
                          <a href="{{url('product_detail/'.$pro->id)}}"><h4>{{$pro->name}}</h4></a>
                          <h6>$18.25</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                          <span>Reviews (12)</span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="pages">
              <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection