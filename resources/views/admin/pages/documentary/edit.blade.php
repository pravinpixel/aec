
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
                                <input type="text" class="form-control col-6"  name="documentary_title" id="documentary_title" value="{{ $contract->documentary_title }}" placeholder="Type Here..." ng-required="true">
                            </div>
                            <div>
                                <a class="btn btn-light btn-sm border shadow-sm"
                                    data-bs-toggle="collapse" href="#collapseFour"
                                    aria-expanded="true" aria-controls="collapseFour">
                                    View summary fields
                                    <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                </a>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse"
                            aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <div class="row m-0 pt-3">
                                @foreach (config('documentary.merge_data') as $key => $col)
                                    <div class="col-6">
                                        <x-accordion path="false" title="{{ $key }}" open="false" argument="null">
                                            <table class="table table-striped border shadow-sm m-0">
                                                @foreach ($col as $colKey => $var )
                                                    <tr>
                                                        <th>{{ $colKey }}</th>
                                                        <td>-</td>
                                                        <td style="color: #9500ff">${{ $var }}</td>
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
                        {{-- <p>{{ $contract->documentary_content }}</p> --}}
                        <div class="textEditorWrapper">
                            <div class="textEditorWrapper d-none">
                                <textarea name="documentary_content" id="textEditor"> {{ $contract->documentary_content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin-documentary-view') }}" class="btn btn-light border me-2">Cancel & Back</a>
                        <button type="button" onclick="preview()" class="btn btn-primary border me-2">Preview</button>
                        <button type="submit" class="btn btn-success">Save </button>
                    </div>
                </div>
            </form>
        </div> <!-- content -->
    </div>
    <div id="PreviewModal" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
            <div class="modal-content h-100 p-0" >
                <div class="modal-header">
                    <h3 id="card-title"></h3>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
                </div>
                <div class="modal-body" style="user-select: none;pointer-event:none" id="preview">
                </div>
                <div class="modal-footer text-end">
                    <a href="{{ route('admin.contract.download',$contract->id) }}" class="btn btn-sm btn-outline-warning rounded-pill"><i class="mdi mdi-download"></i> Download</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        svg[viewBox="0 0 10 8"]{
            display: none;
        }
        svg[viewBox="0 0 16 16"]{
            display: none;
        }
        .modal-body{
            background:white !important;
        }
        .modal-footer{
            background:white !important;
        }
        .ck-content {
            max-height:450px;
            overflow: auto;
        }
    </style>
@endsection
@push('custom-scripts')
    <script>
        $( document ).ready(function() {
            setTimeout(() => {
                SetEditor('#textEditor');
                $('.textEditorWrapper').removeClass('d-none');
            }, 200);
        });
        preview = () => {
            $("#card-title").html($("#documentary_title").val())
            $("#preview").html(editor.getData())
            $('#PreviewModal').modal('show')
        }
    </script>
@endpush
