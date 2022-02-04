//AJANVARAUS -SIVUN LOMAKKEEN KOODIT

    //tarkistaa että  salasanan vahvistus toimii
    function Validate() { //
            var password = document.getElementById("password_1").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Salasanat eivät täsmää.");
                return false;
            }
            return true;
        }

    //näyttää kirjoitetun salasanan
    function myFunction() {
          var x = document.getElementById("password_1");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
