//funcionamiento de los popovers y tooltips
console.log("Activacion del popover"); 

$(function () {
    // popovers
    $('[data-toggle="popover_title"]').popover({
      placement:"right",
      trigger:"hover",
      html:false,
      content:"Hola Mundo",
      title:"Solumovil"
    });

    // tooltips
    // actualizar
    $('[data-toggle="tool"]').tooltip();
    

  });