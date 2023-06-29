<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @page { margin: 20px 0cm; }
        body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            } 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
    </style>
</head>
<body>
    <header style="padding:20px">
        <table style="width:100%">
            <tbody>
                <tr>
                    <td style="vertical-align:top;" colspan="2">
                        <h1 style="line-height:0.5;margin-left:90px;">
                            <span style="font-family:Arial, Helvetica, sans-serif;"><strong>{{ $title }}</strong></span>
                        </h1>
                    </td>
                    <td style="vertical-align:top;" colspan="2">
                        <span style="font-family:Arial, Helvetica, sans-serif;">{!! $logo !!}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </header>
    <main>
        {!! $data !!}
    </main>
</body>
</html>