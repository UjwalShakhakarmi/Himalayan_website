@extends('layouts.Adminlayout')
@section('content')
<style>
td {
    white-space: wordwrap;
}

</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Adult Product</h1>
        <div class="mb-3" >
        <form action="" method="get" style="display: flex; justify-content: end;">

            <select class="form-select form-select mb-3 mr-1"  name="Date_filter"  style="width:120px; margin-right:10px;">
                <option selected>All Dates</option>
                <option value="today">Today</option>
                <option value="Yesterday">Yesterday</option>
                <option value="ThisWeek">This Week</option>
                <option value="LastWeek">Last Week</option>
                <option value="ThisMonth">This Month</option>
                <option value="LastMonth">Last Month</option>
                <option value="ThisYear">This Year</option>
                <option value="LastYear">Last Year</option>
            </select>
            <select class="form-select form-select mb-3" name="Size" aria-label=".form-select example" style="width:111px;">
                <option selected>Size</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
            <div class="input_div" style="margin: 0px 8px 0px 8px;">
                <input type="text" class="form-control" name="Product_Name" placeholder="Search">
            </div>
            <div class="searchbtn">
                <button type="submit" class="btn btn-primary">
                    <ion-icon name="funnel-outline"></ion-icon> Filter
                </button>
            </div>
        </div>
        </form>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product Date</th>
                            <th scope="col">Expiry Date</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                   
                        
                        @foreach($products as $data)
                        @if($data->Category == 'Adult Product' )
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td><img src="{{ asset('storage/img/'.$data->ProductImg) }}"
                                    style="width: 50px;height: 33px;" alt=""></td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->Size}}</td>
                            <td>{{$data->Qunatity_Box}}B-{{$data->Qunatity_piece}}P</td>
                            <td>{{$data->Category}}</td>
                            <td>{{$data->man_date}}</td>
                            <td>{{$data->exp_date}}</td>
                            <td><a href="{{url('edit/'.$data->id)}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a></td>
                            <td><a href="{{url('/delete/'.$data->id)}}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a></td>
                        </tr>
                        @endif
                        @endforeach
                    
                    </tbody>

                </table>
                <!-- End Default Table Example -->
            </div>
        </div>

    </section>

</main><!-- End #main -->

@endsection