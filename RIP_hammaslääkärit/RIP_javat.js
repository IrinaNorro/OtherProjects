
    function lomakeFocus(x) {
        x.style.background = "lightblue";
    }

    function vahenna(elementti) {
        elementti.value=elementti.value-1;
        if (elementti.value<0) {
            elementti.value=0;
        }
    
    }

    function lisaa(elementti) {
        elementti.value=Number(elementti.value)+1;
        if (elementti.value>5) {
            elementti.value=5;
        }
        
    }

    function tarkista(elementti) {
        if (elementti.value>5) {
            window.alert("Anna arvosana 0-5 väliltä");
            elementti.value=0;
        }

        if (elementti.value<0) {
            window.alert("Anna arvosana 0-5 väliltä");
            elementti.value=0;
        }
    }

    function varmista() {
            confirm("Haluatko varmasti lähettää palautteen?");
    }


    function tarkistaNumero (evt) {
        evt = (evt) ? evt : window.event;

        var charCode = (evt.which) ? evt.which : evt.keyCode; 
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }




  