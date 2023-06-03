@extends('layouts.Adminlayout')
@section('content')
<style>
td {
    white-space: wordwrap;
}
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Child Product</h1>
        <div class="mb-3" style="display: flex; justify-content: end;">


            <div class="date" style="margin: 0px 8px 0px 8px; display:flex ">
                <label for="" class="col-form-label ms-1 ">From:</label>
                <input type="date" class="form-control mb-3 ms-1 ">
                <label for="" class="col-form-label ms-1 ">To:</label>
                <input type="date" class="form-control mb-3 ms-1 ">
            </div>
            <select class="form-select form-select mb-3" aria-label=".form-select example" style="width:111px;">
                <option selected>Size</option>
                <option value="1">Small</option>
                <option value="2">Medium</option>
                <option value="3">Large</option>
            </select>
            <div class="input_div" style="margin: 0px 8px 0px 8px;">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Search">
            </div>
            <div class="searchbtn">
                <button type="button" class="btn btn-primary">
                    <ion-icon name="funnel-outline"></ion-icon> Filter
                </button>
            </div>
        </div>


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
                        @foreach($data as $data)
                        @if($data->Category == 'Baby Product' )

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