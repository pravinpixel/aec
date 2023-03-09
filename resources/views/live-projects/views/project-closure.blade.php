    <x-admin-layout>
        <div class="row g-2">
            <div class="col">
                <div class="card shadow-sm border" style="height:350px;overflow-y:auto">
                    <div class="card-header bg-light">
                        <h5 class="m-0">Comments from customer</h5>
                    </div>
                    <div class="card-body">
                        {!! $project->projectClosure->external !!}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border shadow-sm" style="height:350px;overflow-y:auto">
                    <div class="card-header bg-light border-bottom-0">
                        <h5 class="m-0">Your Comments</h5>
                    </div>
                    <div class="card-body">
                        <textarea id="admin-editor" name="internal" class="opacity-0">{!! $project->projectClosure->internal !!}</textarea>
                    </div>
                </div> 
            </div>
        </div>
    </x-admin-layout>
    <x-customer-layout>
        <div class="row g-2">
            <div class="col">
                <div class="card shadow-sm border" style="height:350px;overflow-y:auto">
                    <div class="card-header bg-light">
                        <h5 class="m-0">Comments from team AecPrefab</h5>
                    </div>
                    <div class="card-body">
                        {!! $project->projectClosure->internal !!}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border shadow-sm" style="height:350px;overflow-y:auto">
                    <div class="card-header bg-light border-bottom-0">
                        <h5 class="m-0">Your Comments</h5>
                    </div>
                    <div class="card-body ">
                        <textarea id="admin-editor" name="external" height="100%" class="opacity-0">{!! $project->projectClosure->external !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-customer-layout>

    @push('live-project-custom-scripts')
        <script src="{{ asset('public/assets/js/ckeditor.js') }}"></script>
        <script>
            $(function() {
                renderEditor = (element) => {
                    ClassicEditor.create(document.querySelector(element)).then(editeditor => {
                        window.editor = editeditor
                    });
                }
                renderEditor('#admin-editor')
                renderEditor('#customer-editor')
            });
        </script>
    @endpush
