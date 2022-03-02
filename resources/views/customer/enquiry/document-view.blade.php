<style>
    div {
    height: auto;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> AEC Prefab | Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
    <input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">

</head>
<body>

    <div class="content-page">
        <iframe src="{{ $documentPath }}"width="100%" height="100%"  />
    </div>
</body>
</html>

    