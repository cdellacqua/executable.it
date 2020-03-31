<!DOCTYPE html>
<html>
<head>
    <title>Maintenance page</title>
</head>
<body>
    <form action="/maintenance" method="post">
        @csrf
        <input type="text" placeholder="key" name="key" value="{{ \Illuminate\Support\Facades\Request::query('key') }}">
        <button type="submit">Clear cache & migrate</button>
    </form>
</body>
</html>
