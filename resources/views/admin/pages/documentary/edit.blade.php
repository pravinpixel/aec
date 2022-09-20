     
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
                    <div class="card-header bg-light ">
                        <div class="d-flex align-items-center justify-content-between">
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
                        <div id="collapseFour" class="collapse"
                            aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <div class="row m-0 pt-3">
                                @foreach (config('documentary.merge_data') as $key => $col)
                                    <div class="col-6">
                                        <x-accordion path="false" title="{{ $key }}" open="false">
                                            <table class="table table-striped border shadow-sm m-0">
                                                @foreach ($col as $colKey => $var )
                                                    <tr>
                                                        <th>{{ $colKey }}</th>
                                                        <td>-</td>
                                                        <td style="color: #9500ff">{ {{ $var }} }</td>
                                                    </tr>
                                                @endforeach 
                                            </table> 
                                        </x-accordion> 
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
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