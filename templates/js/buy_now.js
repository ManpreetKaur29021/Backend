function form() {
   document.getElementById('#button').style.display = "none";
   document.getElementById('#form').style.display = "block";
   document.getElementById('#form1').style.display = "none";
   document.getElementById('#fifth').style.display = "none";
}
$("#next").on("click",function(){
   document.getElementById('#button').style.display = "none";
   document.getElementById('#form').style.display = "none";
   document.getElementById('#form1').style.display = "block";
   document.getElementById('#fifth').style.display = "none";
});
$("#pay").on("click",function(){
   document.getElementById('#button').style.display = "none";
   document.getElementById('#form').style.display = "none";
   document.getElementById('#form1').style.display = "none";
   document.getElementById('#fifth').style.display = "block";
});
function verify() {
document.getElementById('#button').style.display = "block";
   document.getElementById('#form').style.display = "none";
   document.getElementById('#form1').style.display = "none";
   document.getElementById('#fifth').style.display = "none";
}
