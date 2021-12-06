@extends('admin.layouts.app')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <form action="#" class="card shadow-lg">
                    <div class="card-header pb-2 p-3 text-center border-0">
                        <h4 class="header-title">Estimation for ENQ001 - New Building Project - Ada Lovelace</h4>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table shadow-sm border m-0 table-bordered ">
                            <thead class="bg-light">
                                <tr>
                                    <th>Enquiry Date</th>
                                    <th>Person Contact</th>
                                    <th>Type of Project</th>
                                    <th>Enquiry Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10  Nov 2021</td>
                                    <td>Arun Prahash</td>
                                    <td>New Construction</td>
                                    <td>In Estimation</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row m-0 mt-3" >
                            <table class="table table-bordered border">
                                <thead>
                                    <tr class="bg-light">
                                        <td colspan="14" class="text-center"><h5>Engineering Estimation</h5></td>
                                    </tr>
                                    <tr class="font-weight-bold ">
                                        <th>Component</th>
                                        <th>Type</th>
                                        <th>Sq.M</th>
                                        <th>Complexity</th>
                                        <th colspan="2">Details</th>
                                        <th colspan="2">Statistics</th>
                                        <th colspan="2">CAD/CAM</th>
                                        <th colspan="2">Logistics</th>
                                        <th colspan="2">Total Cost</th>
                                    </tr>
                                    <tr class="bg-light border" >
                                        <th colspan="4"></th>
                                        <th ><small>Price/M2</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/M2</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/M2</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/M2</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/M2</small></th>
                                        <th ><small>Sum</small></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bg-light border" width="10%">Exterior</td>
                                        <td  width="13%">
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light border">Interior</td>
                                        <td > 
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  class="bg-light border">1st Floor Wall</td>
                                        <td >
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                               
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  class="bg-light border">Roof</td>
                                        <td > 
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                 
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td  class="bg-light border">Flooring</td>
                                        <td > 
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                        <td ><input  type="number" maxlength="6" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-12 shadow text-dark bg-white border p-2">
                                <h4 class="m-0"><span class="text-secondary">Total Cost :</span>    <b>XXXXX</b> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end py-3">
                            <button class="btn btn-outline-primary" type="reset">Cancel &amp; Back</button>
                            <button class="btn btn-primary" type="submit">Update Estimate</button>
                        </div>
                    </div>
                </form>
                
            </div> <!-- container -->

        </div> <!-- content -->


    </div>  

    <style>
        
        .form-control {
            padding-right: 0px !important
        }
    </style>
@endsection

 