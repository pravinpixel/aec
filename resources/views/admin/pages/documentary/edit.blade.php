     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" >
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
            </div>                
            <form action="{{ route('admin.documentary.update', $contract->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card shadow-sm border">
                    <div class="card-header bg-light d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <label class="form-label m-0 px-3" >Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control col-6"  name="documentary_title" value="{{ $contract->documentary_title }}" placeholder="Type Here..." ng-required="true">
                        </div>
                        <div>
                            <a class="btn btn-light btn-sm border shadow-sm"
                                data-bs-toggle="collapse" href="#collapseFour"
                                aria-expanded="true" aria-controls="collapseFour">
                                View merge fields  <i
                                    class="mdi mdi-chevron-down accordion-arrow"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="collapseFour" class="collapse show"
                            aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <table class="table table-bordered border shadow-sm">
                                <thead>
                                    <tr class="bg-light"> 
                                        <th scope="col"><b>Enquiries</b></th>
                                        <th scope="col"><b>Customer</b></th>
                                        <th scope="col"><b>Others</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">
                                            <table>
                                                @foreach ($enquiries as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td scope="row">
                                            <table>
                                                @foreach ($customers as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td scope="row"  style="vertical-align: top !important">
                                            <table>
                                                @foreach ($user_data as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <textarea name="documentary_content" id="textEditor">{{ $contract->documentary_content }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin-documentary-view') }}" class="btn btn-light border me-2">Cancle & Back</a>
                        <button type="submit" class="btn btn-success">Save & Submit</button>
                    </div>
                </div>
            </form>
        </div> <!-- content -->
    </div> 
@endsection
           
@push('custom-scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> 
    <script>
        CKEDITOR.replace( 'textEditor',{
            height : 500
        });
    </script>
@endpush