
new Morris.Area({
    // ID of the element in which to draw the chart.
    element: 'grafico-ventas',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { date: '2019-10-20', value_venta: 100000.00 },
      { date: '2019-10-21', value_venta: 125000.00 },
      { date: '2019-10-22', value_venta: 50000.00 },
      { date: '2019-10-23', value_venta: 25000.00 },
      { date: '2019-10-24', value_venta: 150000.00 },
      { date: '2019-10-25', value_venta: 0.00 },
      { date: '2019-10-26', value_venta: 83000.00 }
      
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'date',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value_venta'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Vendido'],
    hideHover: true,
    fillOpacity : 0.6
  });