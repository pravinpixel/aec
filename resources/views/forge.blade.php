<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no" />
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/style.min.css" type="text/css">
    <script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/viewer3D.min.js"></script>

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
</head>
<body>

    <div id="forgeViewer"></div>

</body>

<!-- Fetch exactly version 7.0.0 -->
<script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.0.0/viewer3D.min.js"></script>

<!-- Fetch latest patch version for 7.0 -->
<script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.0.*/viewer3D.min.js"></script>

<!-- Also fetch latest patch version for 7.0 -->
<script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.0/viewer3D.min.js"></script>

<!-- Fetch latest minor version for 7.0 -->
<script src="https://developer.api.autodesk.com/modelderivative/v2/viewers/7.*/viewer3D.min.js"></script>
<script>
function MyAwesomeExtension(viewer, options) {
  Autodesk.Viewing.Extension.call(this, viewer, options);
}

MyAwesomeExtension.prototype = Object.create(Autodesk.Viewing.Extension.prototype);
MyAwesomeExtension.prototype.constructor = MyAwesomeExtension;

MyAwesomeExtension.prototype.load = function() {
  alert('MyAwesomeExtension is loaded!');
  return true;
};

MyAwesomeExtension.prototype.unload = function() {
  alert('MyAwesomeExtension is now unloaded!');
  return true;
};

Autodesk.Viewing.theExtensionManager.registerExtension('MyAwesomeExtension', MyAwesomeExtension);
</script>

<script>
    var viewer;
var options = {
    env: 'AutodeskProduction2',
    api: 'streamingV2',  // for models uploaded to EMEA change this option to 'streamingV2_EU'
    getAccessToken: function(onTokenReady) {
        var token = '{{$accessToken1}}';
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

var htmlDiv = document.getElementById('forgeViewer');
viewer = new Autodesk.Viewing.GuiViewer3D(htmlDiv, {});

var documentId = 'urn:{{$urn}}';
Autodesk.Viewing.Document.load(documentId, onDocumentLoadSuccess, onDocumentLoadFailure);

function onDocumentLoadSuccess(viewerDocument) {
    // viewerDocument is an instance of Autodesk.Viewing.Document
}

function onDocumentLoadFailure() {
    console.error('Failed fetching Forge manifest');
}

</script>