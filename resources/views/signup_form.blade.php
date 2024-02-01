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
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownBtn">
                    Choose your role
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" value="1" onclick="setRole('Tenant', 'tenant')">Tenant</a></li>
                    <li><a class="dropdown-item" value="2" onclick="setRole('Property Owner', 'owner')">Property Owner</a></li>
                    <li><a class="dropdown-item" value="3" onclick="setRole('Property Manager', 'manager')">Property Manager</a></li>
                    <li><a class="dropdown-item" value="4" onclick="setRole('Administrator', 'admin')">Administrator</a></li>
                </ul>
                <div id="dropdownHelp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-primary-signup">Submit</button>
        </form>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Submission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBodyContent">
                        Are you sure you want to submit the form with the provided information?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            var selectedRole = "";

            function submitForm() {

                var form = document.querySelector('.signup_form');
                
                if (form.checkValidity()){
                    form.submit();
                } else {
                    alert('Please fill in all required fields with valid data.')
                }
            }

            function setRole(role,value) {

                selectedRole = role;

                document.getElementById('roleDropdownBtn').innerHTML = 'Role: ' + role;

            }

            function showConfirmationModal(event) {
                event.preventDefault(); // Prevent the form from submitting directly

                // Collect form data
                var firstName = document.getElementById('inputFirstName').value;
                var lastName = document.getElementById('inputLastName').value;
                var email = document.getElementById('inputEmail').value;


                // Populate modal content
                var modalBody = document.getElementById('modalBodyContent');
                modalBody.innerHTML = '<p><strong>First Name:</strong> ' + firstName + '</p>' +
                                    '<p><strong>Last Name:</strong> ' + lastName + '</p>' +
                                    '<p><strong>Email:</strong> ' + email + '</p>' +
                                    '<p id="selectedRoleText"><strong>Role:</strong> ' + selectedRole + '</p>';

                // Show the confirmation modal
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                return false;
        }

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
                var buttonText = document.getElementById('roleDropdownBtn').innerText.trim();
                var selectedRole = buttonText.replace('Choose your role', '').trim();
                var dropdownHelp = document.getElementById('dropdownHelp');

                var tempFirstNameHelp = "You can input an composed name, as you wish.";
                var tempLastNameHelp = "You can input an composed name here too.";
                var tempEmailHelp = "We'll never share your email with anyone else.";
                var tempPasswordHelp = "Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.";
                var tempConfirmPasswordHelp = "";
                var tempDropdownHelp = "Please choose your role.";

                var isFormValid = false;

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
                    
                    
                    isFormValid = false;

                } else if(!isValidName(lastName)) {

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

                    isFormValid = false;

                } else if (!isValidEmail(email)) {

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

                    isFormValid = false;
                } else if (password.length < 8 || password.length > 20) {

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
                    
                    isFormValid = false;
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
                    
                    isFormValid = false;
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
                
                    isFormValid = false;
                } else if (!(selectedRole == "Role: Tenant" || selectedRole == "Role: Property Owner" || selectedRole == "Role: Property Manager" || selectedRole == "Role: Administrator")) {
                    dropdownHelp.innerHTML = tempDropdownHelp;
                    isFormValid = false;
                } else {
                    isFormValid = true;
                }

                if (isFormValid) {
                    showConfirmationModal(event);
                    return true;
                } else {
                    return false;
                }

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