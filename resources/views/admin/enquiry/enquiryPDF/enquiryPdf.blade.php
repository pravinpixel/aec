<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" >  
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <style>
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; height: 30px; }
    
  </style>
</head>

<body class="antialiased container mt-5">

<!-- {!!  Config::get('documentary.logo.key');  !!} -->
    <header>
        <table class="table table-borderless" >
            <tr>
                <td>
                    <h1>{!!  $title  !!}</h1>
                </td>
                <td>
                     <img width="150px" src="{{ asset("$logo") }}" alt="">
                </td>
            </tr>
        </table>      
    </header>
    <br>
    <br>
    <br>
    <br>
    <main>
        {!! $content !!}    
    </main>
    
    
</body>

</html>