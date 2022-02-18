
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no" />
    <meta charset="utf-8">
    <!-- Autodesk Forge Viewer files -->
    <link rel="stylesheet" href="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/style.min.css" type="text/css">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=pWcfzGYkPy6NvJweun5DFaYCy5UhRBsB3VPlvjMz1_Ecmouvb9Zipdi7lUOxn1ug6MhG76LC3tl9Dy1HDwpSyIWRncHCX5cuBpAJHjyJN1yQQOv_KIOQ-KWkecBbs0ve" charset="UTF-8"></script><script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/viewer3D.min.js"></script>
    <!--Styling to make the page look presentable-->
    <style>
        body {
            margin: 10;
        }
        
        #forgeViewer {
            width: 90%;
            height: 100%;
            margin: 0;
            background-color: #F0F8FF;
        }
    </style>
</head>

<body>
  
    <div id="viewables_dropdown" style="display:none">
        <!-- This drop-down is not visible until there is more than one viewable to display-->
        <br>
        <br>
        <label for="viewables">Choose a viewable:</label>
        <select id="viewables" onchange="selectViewable()"></select>
        <br>
        <br>
    </div>
    <!-- This is where the Forge Viewer will be displayed-->
    <div id="forgeViewer"></div>

    <script>
        var viewer;
        var md_ViewerDocument;
        var md_viewables;

        var inputs = document.querySelectorAll('input');

        function DisplayViewer() {
            var options = {
                env: 'AutodeskProduction',
                api: 'derivativeV2', // for models uploaded to EMEA change this option to 'derivativeV2_EU'
                getAccessToken: function(onTokenReady) {
                
                    var token = '{{$accessToken1}}'
                    var timeInSeconds = 3600; // Use value provided by Forge Authentication (OAuth) API
                    onTokenReady(token, timeInSeconds);
                }
            }

           
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

            var documentId = 'urn:{{$urn}}'; // Add the string 'urn:' to the actual URN value
            Autodesk.Viewing.Document.load(documentId, onDocumentLoadSuccess, onDocumentLoadFailure);

            
        };

        <!--This is called when an option is selected from the Choose viewables drop-down -->
        function selectViewable() {
            
            var indexViewable = document.getElementById("viewables").selectedIndex;
            // Load another viewable from selectedIndex of drop-down.
            viewer.loadDocumentNode(md_ViewerDocument, md_viewables[indexViewable]);
        }

        function onDocumentLoadSuccess(viewerDocument) {

            var viewerapp = viewerDocument.getRoot();
            
            md_ViewerDocument=viewerDocument; // Hold the viewerDocument in a global variable so that we can access it within SelectViewable() 
            md_viewables = viewerapp.search({'type':'geometry'});

            if (md_viewables.length === 0) {
                console.error('Document contains no viewables.');
                return;
            }

            // populate the Choose viewables drop down with the viewable name
            var sel = document.getElementById('viewables');
            for(var i = 0; i < md_viewables.length; i++) {
                var opt = document.createElement('option');
                opt.innerHTML = md_viewables[i].data.name;
                opt.value =  md_viewables[i].data.name;

                sel.appendChild(opt);
            }

            viewer.loadDocumentNode(viewerDocument, md_viewables[0]);


            <!-- Make the Choose viewable drop-down visible, if and only if only there are more than one viewables to display-->

            if (md_viewables.length > 1) {
                var viewablesDIV= document.getElementById("viewables_dropdown");
                viewablesDIV.style.display = "block";

            }
        }

        function onDocumentLoadFailure() {
            console.error('Failed fetching Forge manifest');
        }
        DisplayViewer();
    </script>

</body>

</html>
