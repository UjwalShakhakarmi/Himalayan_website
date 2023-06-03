@extends('layouts.Adminlayout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data</h5>

                <!-- General Form Elements -->
                <form action="{{route('Edit_Product')}}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Product Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Qunatity" class="col-sm-2 col-form-label">Quantity:</label>
                        <div class="col-sm-10 d-flex">
                            <input type="number" class="form-control" name="Qunatity_Box" value="{{$data->Qunatity_Box}}">
                            <label for="Qunatity_Box" class="col-sm-2 col-form-label">--Boxes</label>
                            <input type="number" class="form-control" name="Qunatity_piece" value="{{$data->Qunatity_piece}}">
                            <label for="Qunatity_piece" class="col-sm-2 col-form-label">--Pieces</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Product Image:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile"
                                accept="image/x-png,image/gif,image/jpeg" name="ProductImg" value="{{$data->ProductImg}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Manufactured Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="man_date" value="{{$data->man_date}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Expiry Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="exp_date" value="{{$data->exp_date}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Size:</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="Size">
                                <option selected>Open this select menu</option>
                                <option @if ($data->Size == 'Small') selected @endif
                                    value="Small">
                                    Small</option>
                                <option @if ($data->Size == 'Medium') selected @endif
                                    value="Medium">
                                    Medium</option>
                                <option @if ($data->Size == 'Large') selected @endif
                                    value="Large">
                                    Large</option>
                                <!-- <option value="Small"></option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option> -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Category:</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" 
                                name="Category">
                                <option selected>Open this select menu</option>
                                <option @if ($data->Category == 'Baby Product') selected @endif
                                    value="Baby Product">
                                    Baby Product</option>
                                <option @if ($data->Category == 'Adult Product') selected @endif
                                    value="Adult Product">
                                    Adult Product</option>
                                <!-- 
                                <option value="Baby Product">Baby Product</option>
                                <option value="Adult Product">Adult Product</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="Desc" value="{{$data->Desc}}"></textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

    @endsection