{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" >  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container-fluid bg-dark" style="margin-top: 100px"> 
    <main>
        <header class="container-fluid fixed-top bg-success">
            <table class="table custom table-borderless" >
                <tbody>
                    <tr>
                        <td class="text-start p-0">
                            <div>{{ $title }}</div>
                        </td>
                        <td class="text-end p-0">
                            <img width="150px" src="https://crm.aecprefab.net/public/assets/images/logo_customer.png" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>      
        </header> 
        <table class="table custom table-bordered m-0" style="width: 100% !important">
            {!! $content !!}
        </table>
    </main>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div>
        {{-- <table>
            <thead>
                <tr>
                    <td class="text-start p-0">
                        <div>{{ $title }}</div>
                    </td>
                    <td class="text-end p-0">
                        <img width="150px" src="https://crm.aecprefab.net/public/assets/images/logo_customer.png" alt="">
                    </td>
                </tr>
            </thead>
            <tbody>
                {!! $content !!}
            </tbody>
        </table> --}}
        {!! $content !!}
    </div>
</body>
</html>