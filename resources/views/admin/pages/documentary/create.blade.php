    @extends('layouts.admin')

    @section('admin-content')
        <style>
            .ck-content {
                height: 300px !important;
            }
        </style>
        <div class="content-page">
            <div class="content">
                @include('admin.includes.top-bar')
                <div class="container-fluid">
                    @include('admin.includes.page-navigater')
                </div>
                <form action="{{ route('admin.store-documentary') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="card shadow-sm border">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <label class="form-label m-0 px-3">Title<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control col-6" id="documentary_title"
                                        name="documentary_title" value="{{ old('documentary_title') }}"
                                        placeholder="Type Here..." ng-required="true">
                                </div>
                                <div>
                                    <a class="btn btn-light btn-sm border shadow-sm" data-bs-toggle="collapse"
                                        href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        View merge fields <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-bs-parent="#custom-accordion-one">
                                <div class="row m-0 pt-3">
                                    @foreach (config('documentary.merge_data') as $key => $col)
                                        <div class="col-6">
                                            <x-accordion path="false" title="{{ $key }}" open="false"
                                                argument="null">
                                                <table class="table table-striped border shadow-sm m-0">
                                                    @foreach ($col as $colKey => $var)
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
                            <div class="textEditorWrapper ">
                                <textarea name="documentary_content" class="d-none" id="documentary_editor"></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin-documentary-view') }}" class="btn btn-light border me-2">Cancel &
                                Back</a>
                            <button type="button" onclick="preview()" class="btn btn-primary border me-2">Preview</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div> <!-- content -->
        </div>
        <div id="PreviewModal" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
                <div class="p-3 shadow-sm">
                    <h3 id="card-title"></h3>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px"
                        aria-hidden="true"></button>
                </div>
                <div class="modal-content h-100 p-4" style="overflow: auto">
                    <div class="card-body" id="preview">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endsection


    @push('custom-scripts')
        <script>
            SetEditor('#documentary_editor');
        </script>
        <script>
            preview = () => {
                $("#card-title").html($("#documentary_title").val())
                $("#preview").html(editor.getData())
                $('#PreviewModal').modal('show')
            }
        </script>
    @endpush
