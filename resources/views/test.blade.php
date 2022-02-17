     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page">
        <div class="content" ng-controller="SalesController">
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
            </div>                

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div id="forgeViewer">
                        {{-- <img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="150px"> --}}
                    </div>
                </div>
            </div>
            <div class="">
                <form action="{{ route('uploadfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="myfile">Select files:</label>
                    <input type="file" id="file" name="file" multiple><br><br>
                    <input type="text" id="bucketname" name="bucketname" value="ifc1" ><br><br>
                    <input type="submit">
                  </form>

                  <form action="{{ route('createbucket')}}" method="post">
                    @csrf
                    <label for="myfile">Enter bucket name:</label>
                    <input type="text" id="bucketname" name="bucketname" ><br><br>
                    <input type="submit">
                  </form>


                  <form action="{{ route('getmodelfilelist')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="myfile">enter bucket name:</label>
                    <input type="text" id="bucketname" name="bucketname" value="ifc1" ><br><br>
                    <input type="submit">
                  </form>
            </div>
        </div> <!-- content -->


    </div> 
      
@endsection

@push('customer-styles')
<style>
    body {
        margin: 0;
    }
    #forgeViewer {
        width: 100%;
        height: 100%;
        margin: 0;
        background-color: #F0F8FF;
    }
</style>
<link rel="stylesheet" href="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/style.min.css" type="text/css">

@endpush
@push('custom-scripts')
    <script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/viewer3D.min.js"></script>
    <script>
        var viewer;
        var options = {
            env: 'AutodeskProduction2',
            api: 'streamingV2',  // for models uploaded to EMEA change this option to 'streamingV2_EU'
            getAccessToken: function(onTokenReady) {
                var token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IlU3c0dGRldUTzlBekNhSzBqZURRM2dQZXBURVdWN2VhIn0.eyJzY29wZSI6WyJidWNrZXQ6Y3JlYXRlIiwiYnVja2V0OnJlYWQiLCJidWNrZXQ6dXBkYXRlIiwiYnVja2V0OmRlbGV0ZSIsImRhdGE6cmVhZCIsImRhdGE6Y3JlYXRlIiwiZGF0YTp3cml0ZSJdLCJjbGllbnRfaWQiOiJKVmNLSE5GVFVUVm1wTGVuSld3VTNSTXNtdERhcW1xMiIsImF1ZCI6Imh0dHBzOi8vYXV0b2Rlc2suY29tL2F1ZC9hand0ZXhwNjAiLCJqdGkiOiJ4RHhOQ05aYlMza0IzOGwwUHc0RmRYSmdrbGZiU3hsamlCT0xXb281VklKYXBNdTV1Njg2TnhiMzE2czdzSTBTIiwiZXhwIjoxNjQ1MDk2NzMyfQ.Zt4hAgwKV9l93dGy5BgVFXyMNTJGA-uuLODJONLPhokYhJQYBWfZCxXpZBNC-vkW-yM5CbBDklS50gjtzk-B5IpRPKZY0hz6BuOcRfgmwk4ngF3Gax-1J_yNF9eiSXOrX8rRn97z6bMKACUwgs1ABDvKAn5TuGkogijcLTm-YnwVLvoxeBS3CeKl5WbIfBVzR9Fjamm4JSCp02qyP1mpLke141AKlSP3S3FBcuIi87NSoL3cBjU6oWGEJ4Uvpp77-7iqhvdnenYkzOt3DDXNDh6b5HFb9rwsjA2TpcFgePpwNKnEsISu1uP_Jz5tuIM_3vDLB30nJ_Ld41tWVPoS2Q';
                var timeInSeconds = 3600; // Use value provided by Forge Authentication (OAuth) API
                onTokenReady(token, timeInSeconds);
            }
        };

        Autodesk.Viewing.Initializer(options, function() {

            var htmlDiv = document.getElementById('forgeViewer');
            viewer = new Autodesk.Viewing.GuiViewer3D(htmlDiv);
            var startedCode = viewer.start();

            if (startedCode > 0) {
                console.error('Failed to create a Viewer: WebGL not supported.');
                return;
            }

            console.log('Initialization complete, loading a model next...');

        });

        var documentId = 'urn:dXJuOmFkc2sub2JqZWN0czpvcy5vYmplY3Q6aWZjMi9fT0lQJTIwKDIpLmpmaWY';
        Autodesk.Viewing.Document.load(documentId, onDocumentLoadSuccess, onDocumentLoadFailure);

        function onDocumentLoadSuccess(viewerDocument) {
            var defaultModel = viewerDocument.getRoot().getDefaultGeometry();
            viewer.loadDocumentNode(viewerDocument, defaultModel);
        }

        function onDocumentLoadFailure() {
            console.error('Failed fetching Forge manifest');
        }
        window.open("{{route('viewmodel')}}?fname=" + enquiryProjectCode + "_" + uploadFilesList[idx].name +"&bucketname=" + bucketname, "_blank");
    </script> 
@endpush