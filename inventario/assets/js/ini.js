$(document).ready(function(){
    Plugins();
})

function Plugins(){
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });
}