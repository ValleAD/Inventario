$("#selectall").on("change", function() {
  $(".case").prop("checked", this.checked);
});

$(".case").on("change", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});
$("#selectall2").on("change", function() {
  $(".case").prop("checked", this.checked);
});

$(".case").on("change", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall2").prop("checked", true);
  } else {
    $("#selectall2").prop("checked", false);
  }
});

$("#selectall3").on("change", function() {
  $(".case").prop("checked", this.checked);
});

$(".case").on("change", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall3").prop("checked", true);
  } else {
    $("#selectall3").prop("checked", false);
  }
});
$("#selectall4").on("change", function() {
  $(".case").prop("checked", this.checked);
});

$(".case").on("change", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall4").prop("checked", true);
  } else {
    $("#selectall4").prop("checked", false);
  }
});

      function Validate() {
        var selected_data = 0;
        var tr =document.getElementById('tr')
        //Reference the Table.
        var tblElecProducts = document.getElementById("tblElecProducts");
 
        //Reference all the CheckBoxes in Table.
        var chks = tblElecProducts.getElementsByTagName("INPUT");
 
        //Loop and count the number of checked CheckBoxes.
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                selected_data++;
                tr.style.background="#000"
            }
        }
 
        if (selected_data > 0) {
                        if(confirm(selected_data + " CheckBoxe(s) are checked.")){

            return true;
        }else{
            return false
        }
        
        } else {
            Swal.fire({
              icon: 'error',
              title: 'No se a Selecionado Ningun Producto',
              footer: 'Sistema De Inventario',
         });
        }
        return false;
    };     