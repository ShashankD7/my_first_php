function validatePassword() {
    var password = document.getElementById("password").value;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
    if (!passwordRegex.test(password)) {
        alert("Password must meet the following criteria:\n\n" +
              "- At least one uppercase character\n" +
              "- At least one lowercase character\n" +
              "- At least one special character (@$!%*?&)\n" +
              "- At least one number\n" +
              "- Minimum 8 characters long");
        return false;
    }
    return true;
}