//funcionamiento de los popovers y tooltips

$(function () {
    // popovers
    $('[data-toggle="popover_title"]').popover({
      placement:"right",
      trigger:"hover",
      html:false,
      content:"Hola Mundo",
      title:"Solumovil"
    });

  //  activacion
    $('[data-toggle="tool"]').tooltip();
    

  });
// da inicio   a las datatables
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
//cierra un alert despues de un tiempo corto
window.onload = function(){

$(document).ready(function(){
 //cierra un alert despues de un tiempo corto
 
   setTimeout(function(){
    $("#alertas").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
     }, 5000);

    //cierra la cesion despues de cierto tiempo
    setTimeout(function(){

         window.location.href = "?msg=session_expired_security&type=info";

},1800000);
});
  
}