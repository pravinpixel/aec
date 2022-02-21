<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" >  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        tr td {
            vertical-align: middle !important
        }
    </style>
</head>


<body class="antialiased container-fluid" style="margin-top: 100px">

<!-- {!!  Config::get('documentary.logo.key');  !!} -->
    <header class="container-fluid fixed-top">
        <table class="table table-borderless" >
            <tr>
                <td class="text-start p-0">
                    <div>{{ $title }}</div>
                </td>
                <td class="text-end p-0">
                     <img width="150px" src="{{ asset("$logo") }}" alt="">
                </td>
            </tr>
        </table>      
    </header> 
    <main> 
        <table class="table table-bordered" style="width: 100% !important">
             {!! $content !!}
        </table>
    </main> 
</body>
</html>