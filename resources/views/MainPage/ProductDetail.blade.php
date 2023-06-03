@extends('layouts.MainPageLayout')
@section('content')
  <!-- Page Content -->
  <style>
    .product_img img{
        width: 100%;
        height: 500px;
    }
    .size_show
    {
        display: flex;
        width: 43%;
    }
    .size_display{
        border: 1px solid #abaaaa;
        border-radius: 9px;
        width: 80px;
        text-align: center;
        height: 30px;
        padding: 2px;
    }
    .btm_space{
        margin-bottom: 20px;
    }
    .mark{
        background-color: #968f8fbd;
    }
    
</style>
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

    
    <section>
        <div class="container" style="margin-top:100px ;">
            <div class="row" style="height:550px" >
                <div class="col">
                    <div class="product_img p-2">
                        <img src="{{asset('storage/img/'.$data->ProductImg)}}" alt="ss">
                    </div>
                </div>
                <div class="col border-start p-4">
                    <div class="product_detail ">
                        <div class="product_desc ">
                            <h1 style="margin-bottom: 20px;">{{$data->name}}</h1>
                            <p style="font-Size:20px ; color:green;">$22</p>
                        </div>
                        <hr>
                        <div class="product_desc2">
                            <h4  style="margin-bottom: 20px;">Size:</h4>
                            <div class="size_show btm_space" style="justify-content: space-between;">
                                @if($data->Size == 'Small')
                                <p class="size_display mark ">Small</p>
                                <p class="size_display">Medium</p>
                                <p class="size_display">Large</p>
                                
                                @elseif($data->Size == 'Medium')
                                <p class="size_display">Small</p>
                                <p class="size_display mark">Medium</p>
                                <p class="size_display">Large</p>
                                
                                @else
                                <p class="size_display">Small</p>
                                <p class="size_display">Medium</p>
                                <p class="size_display mark">Large</p>
                                
                                @endif


                            </div>
                            <div class="pro_des btm_space">
                                <h4  style="margin-bottom: 20px;" >Description:</h4>
                                <p>{{$data->Desc}}</p>
                            </div>
                           
                            <h4 style="margin-bottom: 20px;" >Quantity:</h4>
                            <div class="quantity_box d-flex " style="height:35px;">
                                <button class="btn mark" id="desc">-</button>
                                <input class="quantity__input form-control" type="number" min="1" max="100" value="1" style="width: 50px;">
                                <button class="btn mark" id="inc">+</button>
                            </div>
                            <div class="add_btn">
                                <button class="btn btn-success mt-4">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
     <script>
    const desc = document.getElementById('desc');
    const inc = document.getElementById('inc');
    const field = document.querySelector('.quantity__input');

    desc.addEventListener('click',() =>
    {
        if (field.value >= 2) {
            field.value--;
        }
    });
    inc.addEventListener('click',()=>
    {
        if (field.value <= 99) {
            field.value++;
        }
    });
</script>


@endsection