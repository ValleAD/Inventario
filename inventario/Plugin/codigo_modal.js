     
$(document).ready(function(){     
    $("#btn1").click(function(){
        $('#modal1').modal('show');//básico           
    });
    
    $("#btn2").click(function(){
        $('#modal2').modal('show');
        $('#modal2').draggable({}); //arrastrable        
    });
    
        
     $("#btn3").click(function(){
        $('#modal3').modal('show');	       
    });
    
     $("#btn_hide").click(function(){
        $('#modal_custom').modal('hide');	         
    });
     
    
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
    
    $("#btn_custom").click(function(){
        $("#modal_custom").find(".modal-header").css("background", "linear-gradient(to left, #f5af19, #f12711)");
        $("#modal_custom").find(".modal-header").css("color", "white");
        $("#modal_custom").find(".modal-title").text("Ejemplo en vivo de cambio de título");    
        $('#modal_custom').modal('show');
    });
});   