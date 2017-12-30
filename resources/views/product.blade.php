@extends('layouts.baselayout')
@section('title', 'Add New Product')
@section('content')
<div class="container">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="well invoice-container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h3>Add New Product</h3>
                    <div>
                        @if(Session::has('success'))
                            <div class="alert alert-success fade in">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger fade in">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['name' => 'frmAddProduct', 'id' => 'frmAddProduct', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post']) !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Product Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="product_name" name="product_name" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="price" name="price" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Quantity</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="quantity" name="quantity" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="btnAddProduct" id="btnAddProduct" class="btn btn-primary">Add</button>
                                    <button type="reset" name="btnCancelAdd" id="btnCancelAdd" class="btn">Cancel</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h3>Product List</h3>
                    <table class="table table-striped table-hover table-bordered" id="producttable">
                      <thead>
                            <tr role="row">
                                <th>
                                   Product Name
                                </th>
                                <th>
                                   Price
                                </th>
                                <th>
                                   Quantity
                                </th>
                                <th>
                                  Date/Time
                                </th>
                                <th>
                                   Total value number
                                </th>
                                <th>
                                  
                                </th>
                            </tr>
                      </thead>
                      <tbody>
                            @if(isset($data))
                                 @foreach($data as $product)
                                    <tr role="row">
                                        <td>{{$product['name']}}</td>
                                        <td>{{number_format($product['price'],2)}}</td>
                                        <td>{{$product['quantity']}}</td>
                                        <td>{{$product['datetime']}}</td>
                                        <td>{{ number_format($product['quantity'] * $product['price'], 2)}}</td>
                                        <td>Edit</td>
                                    </tr>
                                 @endforeach
                            @endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop