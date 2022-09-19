    function checkAll() {
        var inputs = document.querySelectorAll('.pl'); 
        for (var i = 0; i < inputs.length; i++) { 
            inputs[i].checked = true
        } 
        return false
 }
        function desmarcarTodo() {
            for (let i=0; i<document.f1.elements.length; i++) {
                if(document.f1.elements[i].type == "checkbox") {
                    document.f1.elements[i].checked = false
                }
            }
        }
 function Validate() {
        var selected_data = 0;
 
        //Reference the Table.
        var tblElecProducts = document.getElementById("tblElecProducts");
 
        //Reference all the CheckBoxes in Table.
        var chks = tblElecProducts.getElementsByTagName("INPUT");
 
        //Loop and count the number of checked CheckBoxes.
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                selected_data++;
            }
        }
 
        if (selected_data > 0) {
            alert(selected_data + " CheckBoxe(s) are checked.");
            return true;
        } else {
            Swal.fire({
              icon: 'error',
              title: 'No se a Selecionado Ningun Producto',
              footer: 'Sistema De Inventario',
         });
            return false;
        }
    };