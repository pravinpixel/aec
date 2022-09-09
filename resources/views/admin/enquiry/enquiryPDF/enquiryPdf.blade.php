<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>    
        #watermark {
            position : fixed;
            top: 50%;
            left: 50%;
            z-index: -1000;
            font-size: 80px;
            width: 100%;
            transform: translate(-50%,-50%) rotate(-45deg);
            opacity: .1;
            text-align: center
        }
    </style>
</head>
<body>
    <h1 id="watermark">{{ $status }}</h1> 
    <div>
        {!! $content !!}
    </div>
</body>
</html>