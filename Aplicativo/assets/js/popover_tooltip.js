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