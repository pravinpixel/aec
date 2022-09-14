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
        .status {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            line-height: 35px;
            padding: 10px;
            border-radius: 5px; 
        }
        .WAITING_FOR_RESPONSE , .CHANGE_REQUESTED { 
            color: #ffb700;
            border: 2px solid #ffb700;
        }
        .DENIED { 
            color: #ff2200;
            border: 2px solid #ff2200;
        }
        .APPROVED {
            color: #3ea727;
            border: 2px solid #3ea727;
        }
    </style>
</head>
<body>
    <div>
        <div>
           <b>Response Date :</b> {{ date('d-m-Y') }}
        </div>
        <span class="status {{ str_replace(' ',"_" , $status) }}">{{ $status }}</span>
    </div>
    <h1 id="watermark">{{ $status }}</h1> 
    <div>
        {!! $content !!}
    </div>
</body>
</html>