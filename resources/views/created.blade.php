<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="css/app.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
    <h1>User Created Successfully</h1>
    <p>User details:</p>
    <ul>
        <li>First Name: {{ $user->FirstName }}</li>
        <li>Last Name: {{ $user->LastName }}</li>
        <li>Email: {{ $user->Email }}</li>
    </ul>
</body>
</html>
