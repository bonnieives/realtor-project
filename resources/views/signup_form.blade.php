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
        <form class="signup_form" onsubmit="return validateForm()">
            <h2>Sign Up Form</h2>
            <div class="mb-3">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control sign-up-form" id="inputFirstName" aria-describedby="firstNameHelp">
                    <div id="firstNameHelp" class="form-text">You can input an composed name, as you wish.</div>
            </div>
            <div class="mb-3">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control sign-up-form" id="inputLastName" aria-describedby="lastNameHelp">
                    <div id="lastNameHelp" class="form-text">You can input an composed name here too.</div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control sign-up-form" id="inputEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control sign-up-form" id="inputPassword" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</div>
            </div>
            <div class="mb-3">
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control sign-up-form" id="inputConfirmPassword" aria-describedby="confirmPasswordHelp">
                <div id="confirmPasswordHelp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script>

            function validateForm() {

                var firstName = document.getElementById('inputFirstName').value;
                var lastName = document.getElementById('inputLastName').value;
                var firstNameHelp = document.getElementById('firstNameHelp');
                var lastNameHelp = document.getElementById('lastNameHelp');

                var email = document.getElementById('inputEmail').value;
                var emailHelp = document.getElementById('emailHelp');

                var password = document.getElementById('inputPassword').value;
                var confirmPassword = document.getElementById('inputConfirmPassword').value;
                var passwordHelp = document.getElementById('passwordHelp');
                var confirmPasswordHelp = document.getElementById('confirmPasswordHelp');

                var tempFirstNameHelp = "You can input an composed name, as you wish.";
                var tempLastNameHelp = "You can input an composed name here too.";
                var tempEmailHelp = "We'll never share your email with anyone else.";
                var tempPasswordHelp = "Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.";
                var tempConfirmPasswordHelp = "";

                if(!isValidName(firstName)) {

                    firstNameHelp.innerHTML = "Invalid name format. You must add only alphabetic characters."
                    lastNameHelp.innerHTML = tempLastNameHelp
                    emailHelp.innerHTML = tempEmailHelp
                    passwordHelp.innerHTML = tempPasswordHelp
                    confirmPasswordHelp.innerHTML = tempConfirmPasswordHelp
                    
                    firstNameHelp.style.color = 'red'
                    lastNameHelp.style.color = '#212529BF'
                    emailHelp.style.color =  '#212529BF'
                    passwordHelp.style.color =  '#212529BF'
                    confirmPasswordHelp.style.color =  '#212529BF'
                    
                    
                    return false;

                }

                if(!isValidName(lastName)) {

                    firstNameHelp.innerHTML = tempFirstNameHelp
                    lastNameHelp.innerHTML = "Invalid name format. You must add only alphabetic characters."
                    emailHelp.innerHTML = tempEmailHelp
                    passwordHelp.innerHTML = tempPasswordHelp
                    confirmPasswordHelp.innerHTML = tempConfirmPasswordHelp
                    
                    firstNameHelp.style.color = '#212529BF'
                    lastNameHelp.style.color = 'red'
                    emailHelp.style.color =  '#212529BF'
                    passwordHelp.style.color =  '#212529BF'
                    confirmPasswordHelp.style.color =  '#212529BF'

                    return false;

                }

                if (!isValidEmail(email)) {

                    firstNameHelp.innerHTML = tempFirstNameHelp
                    lastNameHelp.innerHTML = tempLastNameHelp
                    emailHelp.innerHTML = "Invalid email format."
                    passwordHelp.innerHTML = tempPasswordHelp
                    confirmPasswordHelp.innerHTML = tempConfirmPasswordHelp
                    
                    firstNameHelp.style.color = '#212529BF'
                    lastNameHelp.style.color = '#212529BF'
                    emailHelp.style.color =  'red'
                    passwordHelp.style.color =  '#212529BF'
                    confirmPasswordHelp.style.color =  '#212529BF'

                    return false;
                }

                if (password.length < 8 || password.length > 20) {

                    firstNameHelp.innerHTML = tempFirstNameHelp
                    lastNameHelp.innerHTML = tempLastNameHelp
                    emailHelp.innerHTML = tempEmailHelp
                    passwordHelp.innerHTML = "Your password is not in the right length. Please, it must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji."
                    confirmPasswordHelp.innerHTML = tempConfirmPasswordHelp
                    
                    firstNameHelp.style.color = '#212529BF'
                    lastNameHelp.style.color = '#212529BF'
                    emailHelp.style.color =  '#212529BF'
                    passwordHelp.style.color =  'red'
                    confirmPasswordHelp.style.color =  '#212529BF'
                    
                    return false;
                } else if (password != confirmPassword) {
                    
                    firstNameHelp.innerHTML = tempFirstNameHelp
                    lastNameHelp.innerHTML = tempLastNameHelp
                    emailHelp.innerHTML = tempEmailHelp
                    passwordHelp.innerHTML = tempPasswordHelp
                    confirmPasswordHelp.innerHTML = "Informed passwords are different."
                    
                    firstNameHelp.style.color = '#212529BF'
                    lastNameHelp.style.color = '#212529BF'
                    emailHelp.style.color =  '#212529BF'
                    passwordHelp.style.color =  '#212529BF'
                    confirmPasswordHelp.style.color =  'red'
                    
                    return false;
                } else if (/\s/.test(password)) {

                    firstNameHelp.innerHTML = tempFirstNameHelp
                    lastNameHelp.innerHTML = tempLastNameHelp
                    emailHelp.innerHTML = tempEmailHelp
                    confirmPasswordHelp.innerHTML = tempConfirmPasswordHelp
                    passwordHelp.innerHTML = 'Your password must not contain spaces.';
                    
                    firstNameHelp.style.color = '#212529BF'
                    lastNameHelp.style.color = '#212529BF'
                    emailHelp.style.color =  '#212529BF'
                    passwordHelp.style.color =  'red'
                    confirmPasswordHelp.style.color =  '#212529BF'
                
                    return false;
                }

                return true;

            }

            function isValidName(name) {
                return /^[a-zA-Z\s]+$/.test(name);
            }

            function isValidEmail(email) {

                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }
            

        </script>
    </body>
</html>