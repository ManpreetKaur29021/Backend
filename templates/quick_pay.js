var one=document.currentScript.getAttribute('data-payment_button_id');
var url="http://localhost/new_project/templates/quick_pay.php?id="+ one;
// alert(url);
document.write('<iframe src='+url+' frameborder="0" height="700px" width="100%"></iframe>');