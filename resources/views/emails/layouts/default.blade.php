<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? (config('app.name').' Email') }}</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        table {
            border-spacing: 0;
            border: none;
        }
        td {
            padding: .4rem 1ch;
        }
        td > table {
            margin: -.4rem -1ch;
        }
        h1 {
            font-size: 1.2em;
            font-variant: small-caps;
            text-align: center;
        }
        h2 {
            font-size: .9em;
            text-align: center;
        }
    </style>
</head>
<body>
    @yield('body')
</body>
</html>
