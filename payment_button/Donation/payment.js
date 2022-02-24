$(".required").hide();
$(".next-1").click(function(){
    var val=$(".button_title").val();
if(val<=0){
    $(".PASSWORD").show();
}else{
    $(".first").addClass("invisible")
    $(".second").removeClass("invisible")
    $(".third").addClass("invisible")
    $(".forth").addClass("invisible")
}

    
})
$(".next-2").click(function(){
    $(".first").addClass("invisible")
    $(".second").addClass("invisible")
    $(".third").removeClass("invisible")
    $(".forth").addClass("invisible")
})
$(".back-2").click(function(){
    $(".first").removeClass("invisible")
    $(".second").addClass("invisible")
    $(".third").addClass("invisible")
    $(".forth").addClass("invisible")
})
$(".next-3").click(function(){
    $(".first").addClass("invisible")
    $(".second").addClass("invisible")
    $(".third").addClass("invisible")
    $(".forth").removeClass("invisible")
})
$(".back-3").click(function(){
    $(".first").addClass("invisible")
    $(".second").removeClass("invisible")
    $(".third").addClass("invisible")
    $(".forth").addClass("invisible")
})
$(".back-4").click(function(){
    $(".first").addClass("invisible")
    $(".second").addClass("invisible")
    $(".third").removeClass("invisible")
    $(".forth").addClass("invisible")
})

// form-1
var input = document.getElementById('title');
var input2 = document.getElementById('myInput2');
var input21 = document.getElementById('myInput2-1');
input2.value = input.value;
input21.value = input.value;  
    $('#title').on('input', function() {
        input2.value = input.value;
        input21.value = input.value;
    });

    $('#theme').on('input', function() {
      
       var color=$("#theme").val();
        if (color=="Dark"){
            document.getElementById("paybutton").classList.add("dark");
            document.getElementById("paybutton").classList.remove("light");
            document.getElementById("paybutton1").classList.add("dark");
            document.getElementById("paybutton1").classList.remove("light");
            document.getElementById("myInput2").classList.add("dark-input");
            document.getElementById("myInput2").classList.remove("light-input");
            document.getElementById("myInput2-1").classList.add("dark-input");
            document.getElementById("myInput2-1").classList.remove("light-input");
        }
        if (color=="Light"){
            document.getElementById("paybutton").classList.add("light");
            document.getElementById("paybutton").classList.remove("dark");
            document.getElementById("paybutton1").classList.add("light");
            document.getElementById("paybutton1").classList.remove("dark");
            document.getElementById("myInput2").classList.add("light-input");
            document.getElementById("myInput2").classList.remove("dark-input");
            document.getElementById("myInput2-1").classList.add("light-input");
            document.getElementById("myInput2-1").classList.remove("dark-input");
        }

    });


//form-2


var form2l = document.getElementById('form-2-label');
var form2o = document.getElementById('donation-label');
var form2o1 = document.getElementById('donation-label-1');
form2o.value = form2l.value;
form2o1.value = form2l.value;   
    $('#form-2-label').on('input', function() {
        form2o.value = form2l.value;
        form2o1.value = form2l.value;
    });

// form-3
        //email
var emaillabel = document.getElementById('email-label');
var emailoutput = document.getElementById('email-output');
var emailoutput1 = document.getElementById('email-output-1');
emailoutput.value = emaillabel.value;
emailoutput1.value = emaillabel.value; 
    $('#email-label').on('input', function() {
        emailoutput.value = emaillabel.value;
        emailoutput1.value = emaillabel.value;
    });

        //phone
var phonelabel = document.getElementById('phone-label');
var phoneoutput = document.getElementById('phone-output');
var phoneoutput1 = document.getElementById('phone-output-1');
phoneoutput.value = phonelabel.value;
phoneoutput1.value = phonelabel.value;
    $('#phone-label').on('input', function() {
        phoneoutput.value = phonelabel.value;
        phoneoutput1.value = phonelabel.value;
    });

        //name
        var namelabel = document.getElementById('name-label');
        var nameoutput = document.getElementById('name-output');
        var nameoutput1 = document.getElementById('name-output-1');
        nameoutput.value = namelabel.value;
        nameoutput1.value = namelabel.value;    
            $('#name-label').on('input', function() {
                nameoutput.value = namelabel.value;
                nameoutput1.value = namelabel.value;
            });

        //address
var addresslabel = document.getElementById('adress-label');
var addressoutput = document.getElementById('adress-output');
var addressoutput1 = document.getElementById('adress-output-1');
addressoutput.value = addresslabel.value;
addressoutput1.value = addresslabel.value;   
    $('#adress-label').on('input', function() {
        addressoutput.value = addresslabel.value;
        addressoutput1.value = addresslabel.value;
    });
        //pincode
var pincodelabel = document.getElementById('pincode-label');
var pincodeoutput = document.getElementById('pincode-output');
var pincodeoutput1 = document.getElementById('pincode-output-1');
pincodeoutput.value = pincodelabel.value;
pincodeoutput1.value = pincodelabel.value;   
    $('#pincode-label').on('input', function() {
        pincodeoutput.value = pincodelabel.value;
        pincodeoutput1.value = pincodelabel.value;
    });        