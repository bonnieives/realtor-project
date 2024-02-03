<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="css/app.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="antialiased">
        
        <form class="login_form">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Realtors Montreal</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>

            <button type="button" class="btn btn-primary btn-sm">Login</button>
            <button href="{{ route('signup-form') }}" type="button" class="btn btn-secondary btn-sm">Signup</button>

        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelector('.btn-secondary').addEventListener('click', function (event) {
                    event.preventDefault();
                    window.location.href = this.getAttribute('href');
                });
            });
        </script>

    </body>
</html>
