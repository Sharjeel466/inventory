// ***********************************************

$(document).ready(function() {

  $('#amount_paid').on('keyup', function() {
    var value = $(this).val();

    $.ajax({
      url: 'digit_to_currency.php',
      data: {number: value},
      success: function(data){
        $('.amount-in-words').val(data);
      }
    });

  });

  $('#edit-amount-paid').on('keyup', function() {
    var value = $(this).val();

    $.ajax({
      url: 'digit_to_currency.php',
      data: {number: value},
      success: function(data){
        $('.amount-in-words').val(data);
      }
    });
  });

});

// ***********************************************

$(document).ready(function() {

  $('#edit-cargo').val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });

  $('#edit-total-qty').val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });

  $('#edit-amount-paid').val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });
});

// ***********************************************

$('#edit-cargo').on('keyup', function(){

  $(this).val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });
});

$('#edit-amount-paid').on('keyup', function(){

  $(this).val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });
});

$('#edit-total-qty').on('keyup', function(){

  $(this).val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });
});

$('#amount_paid').on('keyup', function(){

  $(this).val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });
});

$('.add_product_qty').on('keyup', function(){

  $(this).val(function(index, value) {
    return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
  });

  $('#cargo').on('keyup', function(){

    $(this).val(function(index, value) {
      return value.replace(/\D/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
    });
  });
});

// ***********************************************

$(document).ready(function() {
  $('#production_submit').click(function(){
    var mixture_name = $('#mixture-name').val();

    if (mixture_name == '') {
      alert('Mixture name is Required !!!')      
    }
    else{  
      var confirm = window.confirm('Are you sure you want to Submit !!!');
      if (confirm) {
        $('#production-form').submit();
      }else{
        event.preventDefault();
      }
    }
  });
});

// ***********************************************

function costing($id, $shake){

  var id = $id;
  var shake = $shake;

  $.ajax({
    url: 'costing-data-get.php',
    data: {id: id},
    success: function(data){
      var value = JSON.parse(data);

      $('#shake').html('');
      $('#product_name').html('');
      $('#user_qty').html('');
      $('#product_qty').html('');
      var product_name = '';
      $.each(value, function(index, val) {
        product_name += '<div class="col-md-3">'+val.product_name+'</div>';
      }); 

      var user_qty = '';
      $.each(value, function(index, val) {
        user_qty += '<div class="col-md-3">'+val.user_qty+'</div>';
      }); 

      var product_qty = '';
      $.each(value, function(index, val) {
        product_qty += '<div class="col-md-3">'+val.total_product_qty+'</div>';
      }); 

      $('#shake').text(shake);
      $('#product_name').append(product_name);
      $('#user_qty').append(user_qty);
      $('#product_qty').append(product_qty);
      $('#costing-data').modal('show');

    }
  });

}

// ***********************************************

$('#production').click(function() {

  $('.modal-body .row .col-md-4 #model_arr').html('');
  $('.modal-body .row .col-md-4 #model_stock').html('');
  $('.modal-body .row .col-md-4 #model_price').html('');

  var model_ind = 0;
  var model_attr = 1;
  var model_arr = [];

  $('.inventory').each(function() {
    model_arr[model_ind++] = $('.model_data_'+model_attr++).find('option:selected').text();
  });

  var model_arr_html = '';
  $.each(model_arr, function(index, val) {
    model_arr_html += '<div>'+val+'</div>';
  });
  $('#model_arr').append(model_arr_html);

  var stock_ind = 0;
  var stock_attr = 1;
  var stock_arr = [];

  $('.hidden_model_data').each(function() {
    stock_arr[stock_ind++] = $('.product-required-'+stock_attr++).val();
  });

  var stock_arr_html = '';
  $.each(stock_arr, function(index, val) {
    stock_arr_html += '<div>'+val+'</div>';
  });
  $('#model_stock').append(stock_arr_html);


  var model_product_number = 1;
  var model_product_ind = 0;
  var model_product_arr = [];
  $('.inventory').each(function() {
    model_product_arr[model_product_ind++] = $('.model_data_'+model_product_number++).find('option:selected').attr('price');
  });

  var price_arr = [];

  for (var i = 0; i < stock_arr.length; i++) {
    price_arr[i] = stock_arr[i] * model_product_arr[i];
    price_arr[i] = price_arr[i].toFixed(2);
  }

  var price_arr_html = '';
  $.each(price_arr, function(index, val) {
    price_arr_html += '<div>'+val+'</div>';
  });
  $('#model_price').append(price_arr_html);

});

// ********************Edit Stock***************************

$(document).on('change paste keyup', '#edit-total-qty, #edit-shortage, #edit-amount-paid, #edit-cargo', function() {

  var product_qty = $('#edit-total-qty').val();
  product_qty = product_qty.replace(/,/gi, "");

  var shortage = $('#edit-shortage').val();
  
  var amount_paid = $('#edit-amount-paid').val();
  amount_paid = amount_paid.replace(/,/gi, "");

  var cargo = $('#edit-cargo').val();
  cargo = cargo.replace(/,/gi, "");
  
  var total_qty = $('#edit-qty-after-shortage').val();

  var amount = (parseFloat(cargo) + parseFloat(amount_paid)) / parseFloat(total_qty);

  var percentage = ((parseFloat(product_qty) * parseFloat(shortage)) / 100);

  var val = product_qty - percentage;
  $('#edit-qty-after-shortage').val(val.toFixed(2));
  $('#edit-amount-per-kg').val(amount.toFixed(2));

});

// ********************Add new Stock***************************

$(document).on('change paste keyup', '.add_product_qty, #amount_paid, #cargo, #shortage', function() {

  var product_qty = $('.add_product_qty').val();
  product_qty = product_qty.replace(/,/gi, "");

  var shortage = $('#shortage').val();

  var amount_paid = $('#amount_paid').val();
  amount_paid = amount_paid.replace(/,/gi, "");

  var total_qty = $('#total_qty').val();

  var cargo = $('#cargo').val();
  cargo = cargo.replace(/,/gi, "");


  var amount = (parseFloat(cargo) + parseFloat(amount_paid)) / parseFloat(total_qty);

  var percentage = ((parseFloat(product_qty) * parseFloat(shortage)) / 100);
  var val = product_qty - percentage;
  $('#total_qty').val(val.toFixed(2));
  $('#amount_per_kg').val(amount.toFixed(2));

});

// ***********************************************

$(document).ready(function() {

  $('#mat-number').change(function(){
    var mat_number = $(this).val();
    $('input').val('');

    $.ajax({
      url: 'db-stock.php',
      data: {mat_number:mat_number},
      success: function(response){

        $('#products-show-wrapper').html(response);

        $(document).on('change', '.inventory', function(){
          var selected = $(this).val();
          var qty = $(this).find('option:selected').attr('qty');
          var text = $(this).find('option:selected').text();
          var data_id = $(this).data('id');
          var qty_length = $('.product_qty-'+data_id).attr('maxlength', qty.length);
          var t_price = $(this).find('option:selected').attr('price');

          $('.production_product_name-'+data_id).val(text);
          $('.product_qty-'+data_id).attr('product_id', selected);
          $('.prod_id-'+data_id).text(qty);
          $('.product_qty-'+data_id).val(qty);


          $('.inventory').each(function(index){
            if($(this).data('id') != data_id){
              $(this).find('option[value='+selected+']').remove();
            }
          });

          $(document).on('keyup', '.product_qty-'+data_id, function() {
            var prod_qty = $(this).val();
            var x = t_price * prod_qty;

            $('#hidden-product_qty-'+data_id).val(x.toFixed(2));

            var t = 0;
            $('.hidden_data').each( function() {
              t += parseFloat($(this).val());
            });

            var q = 0;
            $('.t_qty').each( function() {
              q += parseFloat($(this).val());
            });

            $('#total-qty').val(q.toFixed(2));
            var quantity = $('#total-qty').val();

            $('#total').val((t.toFixed(2) / quantity).toFixed(2));


            $(document).on('keyup', '#required-qty', function() {
              var required_qty = $(this).val();
              var total_per_kg = $('#total').val();
              var all_total = required_qty * total_per_kg; 
              var total_quantity = $('#total-qty').val();
              var production_all_total = $('.production_all_total').val();
              console.log(production_all_total)

              $.ajax({
                url: '../stock/digit_to_currency.php',
                data: {number: production_all_total},
                success: function(data){
                  $('.amount-in-words').val(data);
                }
              });


              var total_sub_data = [];
              var total_sub_data_i = 0;
              for (var i = 1; i <= $('.hidden_model_data').length; i++) {
                total_sub_data[total_sub_data_i++] = $('.product-required-'+i).val() * $('.model_data_'+i).find('option:selected').attr('price');
              }

              var total_sub_data_sum = 0;
              $.each(total_sub_data, function(index, val) {
                total_sub_data_sum += val;
              });

              $('#all_total').val(total_sub_data_sum.toFixed(2));

              $('#total').val(($('#all_total').val() / required_qty).toFixed(3));

              var total_divide = required_qty/total_quantity;
              var require_divided = total_divide.toFixed(2);


              var a = [];
              y = 0;
              $('.t_qty').each( function() {
                a[y++] = [parseFloat($(this).val()), parseInt($(this).attr('product_id'))];
              });

              for (var i = 1; i <= a.length; i++) {
                var find_stock = require_divided * $('.product_qty-'+i).val();
                $('.product-required-'+i).val(find_stock.toFixed(2));
              }

              z = 0;
              var stock_in_db = [];
              $.each(a, function(index, val) {
                stock_in_db[z++] = [(parseFloat(val) * parseFloat(require_divided)).toFixed(2), val[1]];
              });


              abc = 0;
              var val_from_user = [];
              $.each(stock_in_db, function(index, val) {
                val_from_user[abc++] = val[0];
              });

              cba = 0;
              var stock_in_database = [];
              $('.product_id').each(function() {
                stock_in_database[cba++] = $(this).text();
              });

              var data_id = 1;
              for (var i = 0; i < val_from_user.length; i++) { 
                if (parseFloat(val_from_user[i]) <= parseInt(stock_in_database[i])) {
                  $('.product_qty-'+data_id).css('borderColor', '#ced4da');

                  data_id++;
                }
                else if(parseFloat(val_from_user[i]) > parseInt(stock_in_database[i])){                 
                  $('.product_qty-'+data_id).css('borderColor', 'red');

                  data_id++;
                }
              }
            });
          });
        });   
}
});
});
});

var specialKeys = new Array();
specialKeys.push(8,46);
function IsNumeric(e) {
  var keyCode = e.which ? e.which : e.keyCode;
  var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
  return ret;
}

(function ($) {
// USE STRICT
"use strict";

try {
//WidgetChart 1
var ctx = document.getElementById("widgetChart1");
if (ctx) {
  ctx.height = 130;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      type: 'line',
      datasets: [{
        data: [78, 81, 80, 45, 34, 12, 40],
        label: 'Dataset',
        backgroundColor: 'rgba(255,255,255,.1)',
        borderColor: 'rgba(255,255,255,.55)',
      },]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 0
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
}


//WidgetChart 2
var ctx = document.getElementById("widgetChart2");
if (ctx) {
  ctx.height = 130;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'],
      type: 'line',
      datasets: [{
        data: [1, 18, 9, 17, 34, 22],
        label: 'Dataset',
        backgroundColor: 'transparent',
        borderColor: 'rgba(255,255,255,.55)',
      },]
    },
    options: {

      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          tension: 0.00001,
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
}


//WidgetChart 3
var ctx = document.getElementById("widgetChart3");
if (ctx) {
  ctx.height = 130;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'],
      type: 'line',
      datasets: [{
        data: [65, 59, 84, 84, 51, 55],
        label: 'Dataset',
        backgroundColor: 'transparent',
        borderColor: 'rgba(255,255,255,.55)',
      },]
    },
    options: {

      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      scales: {
        xAxes: [{
          gridLines: {
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
          }
        }]
      },
      title: {
        display: false,
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
}


//WidgetChart 4
var ctx = document.getElementById("widgetChart4");
if (ctx) {
  ctx.height = 115;
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
      {
        label: "My First dataset",
        data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
        borderColor: "transparent",
        borderWidth: "0",
        backgroundColor: "rgba(255,255,255,.3)"
      }
      ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          display: false,
          categoryPercentage: 1,
          barPercentage: 0.65
        }],
        yAxes: [{
          display: false
        }]
      }
    }
  });
}

// Recent Report
const brandProduct = 'rgba(0,181,233,0.8)'
const brandService = 'rgba(0,173,95,0.8)'

var elements = 10
var data1 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

var ctx = document.getElementById("recent-rep-chart");
if (ctx) {
  ctx.height = 250;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
      datasets: [
      {
        label: 'My First dataset',
        backgroundColor: brandService,
        borderColor: 'transparent',
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data1

      },
      {
        label: 'My Second dataset',
        backgroundColor: brandProduct,
        borderColor: 'transparent',
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data2

      }
      ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            drawOnChartArea: true,
            color: '#f2f2f2'
          },
          ticks: {
            fontFamily: "Poppins",
            fontSize: 12
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            stepSize: 50,
            max: 150,
            fontFamily: "Poppins",
            fontSize: 12
          },
          gridLines: {
            display: true,
            color: '#f2f2f2'

          }
        }]
      },
      elements: {
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
          hoverBorderWidth: 3
        }
      }


    }
  });
}

// Percent Chart
var ctx = document.getElementById("percent-chart");
if (ctx) {
  ctx.height = 280;
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [
      {
        label: "My First dataset",
        data: [60, 40],
        backgroundColor: [
        '#00b5e9',
        '#fa4251'
        ],
        hoverBackgroundColor: [
        '#00b5e9',
        '#fa4251'
        ],
        borderWidth: [
        0, 0
        ],
        hoverBorderColor: [
        'transparent',
        'transparent'
        ]
      }
      ],
      labels: [
      'Products',
      'Services'
      ]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      cutoutPercentage: 55,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      legend: {
        display: false
      },
      tooltips: {
        titleFontFamily: "Poppins",
        xPadding: 15,
        yPadding: 10,
        caretPadding: 0,
        bodyFontSize: 16
      }
    }
  });
}

} catch (error) {
  console.log(error);
}



try {

// Recent Report 2
const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
const bd_brandService2 = 'rgba(0,173,95,0.9)'
const brandProduct2 = 'rgba(0,181,233,0.2)'
const brandService2 = 'rgba(0,173,95,0.2)'

var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

var ctx = document.getElementById("recent-rep2-chart");
if (ctx) {
  ctx.height = 230;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
      datasets: [
      {
        label: 'My First dataset',
        backgroundColor: brandService2,
        borderColor: bd_brandService2,
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data3

      },
      {
        label: 'My Second dataset',
        backgroundColor: brandProduct2,
        borderColor: bd_brandProduct2,
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data4

      }
      ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            drawOnChartArea: true,
            color: '#f2f2f2'
          },
          ticks: {
            fontFamily: "Poppins",
            fontSize: 12
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            stepSize: 50,
            max: 150,
            fontFamily: "Poppins",
            fontSize: 12
          },
          gridLines: {
            display: true,
            color: '#f2f2f2'

          }
        }]
      },
      elements: {
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
          hoverBorderWidth: 3
        },
        line: {
          tension: 0
        }
      }


    }
  });
}

} catch (error) {
  console.log(error);
}


try {

// Recent Report 3
const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
const bd_brandService3 = 'rgba(0,173,95,0.9)';
const brandProduct3 = 'transparent';
const brandService3 = 'transparent';

var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

var ctx = document.getElementById("recent-rep3-chart");
if (ctx) {
  ctx.height = 230;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
      datasets: [
      {
        label: 'My First dataset',
        backgroundColor: brandService3,
        borderColor: bd_brandService3,
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data5,
        pointBackgroundColor: bd_brandService3
      },
      {
        label: 'My Second dataset',
        backgroundColor: brandProduct3,
        borderColor: bd_brandProduct3,
        pointHoverBackgroundColor: '#fff',
        borderWidth: 0,
        data: data6,
        pointBackgroundColor: bd_brandProduct3

      }
      ]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            drawOnChartArea: true,
            color: '#f2f2f2'
          },
          ticks: {
            fontFamily: "Poppins",
            fontSize: 12
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            stepSize: 50,
            max: 150,
            fontFamily: "Poppins",
            fontSize: 12
          },
          gridLines: {
            display: false,
            color: '#f2f2f2'
          }
        }]
      },
      elements: {
        point: {
          radius: 3,
          hoverRadius: 4,
          hoverBorderWidth: 3,
          backgroundColor: '#333'
        }
      }


    }
  });
}

} catch (error) {
  console.log(error);
}

try {
//WidgetChart 5
var ctx = document.getElementById("widgetChart5");
if (ctx) {
  ctx.height = 220;
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
      {
        label: "My First dataset",
        data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
        borderColor: "transparent",
        borderWidth: "0",
        backgroundColor: "#ccc",
      }
      ]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          display: false,
          categoryPercentage: 1,
          barPercentage: 0.65
        }],
        yAxes: [{
          display: false
        }]
      }
    }
  });
}

} catch (error) {
  console.log(error);
}

try {

// Percent Chart 2
var ctx = document.getElementById("percent-chart2");
if (ctx) {
  ctx.height = 209;
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [
      {
        label: "My First dataset",
        data: [60, 40],
        backgroundColor: [
        '#00b5e9',
        '#fa4251'
        ],
        hoverBackgroundColor: [
        '#00b5e9',
        '#fa4251'
        ],
        borderWidth: [
        0, 0
        ],
        hoverBorderColor: [
        'transparent',
        'transparent'
        ]
      }
      ],
      labels: [
      'Products',
      'Services'
      ]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      cutoutPercentage: 87,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          fontSize: 14,
          fontFamily: "Poppins,sans-serif"
        }

      },
      tooltips: {
        titleFontFamily: "Poppins",
        xPadding: 15,
        yPadding: 10,
        caretPadding: 0,
        bodyFontSize: 16,
      }
    }
  });
}

} catch (error) {
  console.log(error);
}

try {
//Sales chart
var ctx = document.getElementById("sales-chart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
      type: 'line',
      defaultFontFamily: 'Poppins',
      datasets: [{
        label: "Foods",
        data: [0, 30, 10, 120, 50, 63, 10],
        backgroundColor: 'transparent',
        borderColor: 'rgba(220,53,69,0.75)',
        borderWidth: 3,
        pointStyle: 'circle',
        pointRadius: 5,
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'rgba(220,53,69,0.75)',
      }, {
        label: "Electronics",
        data: [0, 50, 40, 80, 40, 79, 120],
        backgroundColor: 'transparent',
        borderColor: 'rgba(40,167,69,0.75)',
        borderWidth: 3,
        pointStyle: 'circle',
        pointRadius: 5,
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'rgba(40,167,69,0.75)',
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Poppins',
        bodyFontFamily: 'Poppins',
        cornerRadius: 3,
        intersect: false,
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true,
          fontFamily: 'Poppins',
        },
      },
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month'
          },
          ticks: {
            fontFamily: "Poppins"
          }
        }],
        yAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: true,
            labelString: 'Value',
            fontFamily: "Poppins"

          },
          ticks: {
            fontFamily: "Poppins"
          }
        }]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }
  });
}


} catch (error) {
  console.log(error);
}

try {

//Team chart
var ctx = document.getElementById("team-chart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
      type: 'line',
      defaultFontFamily: 'Poppins',
      datasets: [{
        data: [0, 7, 3, 5, 2, 10, 7],
        label: "Expense",
        backgroundColor: 'rgba(0,103,255,.15)',
        borderColor: 'rgba(0,103,255,0.5)',
        borderWidth: 3.5,
        pointStyle: 'circle',
        pointRadius: 5,
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'rgba(0,103,255,0.5)',
      },]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Poppins',
        bodyFontFamily: 'Poppins',
        cornerRadius: 3,
        intersect: false,
      },
      legend: {
        display: false,
        position: 'top',
        labels: {
          usePointStyle: true,
          fontFamily: 'Poppins',
        },


      },
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month'
          },
          ticks: {
            fontFamily: "Poppins"
          }
        }],
        yAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: true,
            labelString: 'Value',
            fontFamily: "Poppins"
          },
          ticks: {
            fontFamily: "Poppins"
          }
        }]
      },
      title: {
        display: false,
      }
    }
  });
}


} catch (error) {
  console.log(error);
}

try {
//bar chart
var ctx = document.getElementById("barChart");
if (ctx) {
  ctx.height = 200;
  var myChart = new Chart(ctx, {
    type: 'bar',
    defaultFontFamily: 'Poppins',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
      {
        label: "My First dataset",
        data: [65, 59, 80, 81, 56, 55, 40],
        borderColor: "rgba(0, 123, 255, 0.9)",
        borderWidth: "0",
        backgroundColor: "rgba(0, 123, 255, 0.5)",
        fontFamily: "Poppins"
      },
      {
        label: "My Second dataset",
        data: [28, 48, 40, 19, 86, 27, 90],
        borderColor: "rgba(0,0,0,0.09)",
        borderWidth: "0",
        backgroundColor: "rgba(0,0,0,0.07)",
        fontFamily: "Poppins"
      }
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      scales: {
        xAxes: [{
          ticks: {
            fontFamily: "Poppins"

          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            fontFamily: "Poppins"
          }
        }]
      }
    }
  });
}


} catch (error) {
  console.log(error);
}

try {

//radar chart
var ctx = document.getElementById("radarChart");
if (ctx) {
  ctx.height = 200;
  var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
      defaultFontFamily: 'Poppins',
      datasets: [
      {
        label: "My First dataset",
        data: [65, 59, 66, 45, 56, 55, 40],
        borderColor: "rgba(0, 123, 255, 0.6)",
        borderWidth: "1",
        backgroundColor: "rgba(0, 123, 255, 0.4)"
      },
      {
        label: "My Second dataset",
        data: [28, 12, 40, 19, 63, 27, 87],
        borderColor: "rgba(0, 123, 255, 0.7",
        borderWidth: "1",
        backgroundColor: "rgba(0, 123, 255, 0.5)"
      }
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      scale: {
        ticks: {
          beginAtZero: true,
          fontFamily: "Poppins"
        }
      }
    }
  });
}

} catch (error) {
  console.log(error)
}

try {

//line chart
var ctx = document.getElementById("lineChart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      defaultFontFamily: "Poppins",
      datasets: [
      {
        label: "My First dataset",
        borderColor: "rgba(0,0,0,.09)",
        borderWidth: "1",
        backgroundColor: "rgba(0,0,0,.07)",
        data: [22, 44, 67, 43, 76, 45, 12]
      },
      {
        label: "My Second dataset",
        borderColor: "rgba(0, 123, 255, 0.9)",
        borderWidth: "1",
        backgroundColor: "rgba(0, 123, 255, 0.5)",
        pointHighlightStroke: "rgba(26,179,148,1)",
        data: [16, 32, 18, 26, 42, 33, 44]
      }
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          ticks: {
            fontFamily: "Poppins"

          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            fontFamily: "Poppins"
          }
        }]
      }

    }
  });
}


} catch (error) {
  console.log(error);
}


try {

//doughut chart
var ctx = document.getElementById("doughutChart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [45, 25, 20, 10],
        backgroundColor: [
        "rgba(0, 123, 255,0.9)",
        "rgba(0, 123, 255,0.7)",
        "rgba(0, 123, 255,0.5)",
        "rgba(0,0,0,0.07)"
        ],
        hoverBackgroundColor: [
        "rgba(0, 123, 255,0.9)",
        "rgba(0, 123, 255,0.7)",
        "rgba(0, 123, 255,0.5)",
        "rgba(0,0,0,0.07)"
        ]

      }],
      labels: [
      "Green",
      "Green",
      "Green",
      "Green"
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true
    }
  });
}


} catch (error) {
  console.log(error);
}


try {

//pie chart
var ctx = document.getElementById("pieChart");
if (ctx) {
  ctx.height = 200;
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      datasets: [{
        data: [45, 25, 20, 10],
        backgroundColor: [
        "rgba(0, 123, 255,0.9)",
        "rgba(0, 123, 255,0.7)",
        "rgba(0, 123, 255,0.5)",
        "rgba(0,0,0,0.07)"
        ],
        hoverBackgroundColor: [
        "rgba(0, 123, 255,0.9)",
        "rgba(0, 123, 255,0.7)",
        "rgba(0, 123, 255,0.5)",
        "rgba(0,0,0,0.07)"
        ]

      }],
      labels: [
      "Green",
      "Green",
      "Green"
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true
    }
  });
}


} catch (error) {
  console.log(error);
}

try {

// polar chart
var ctx = document.getElementById("polarChart");
if (ctx) {
  ctx.height = 200;
  var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
      datasets: [{
        data: [15, 18, 9, 6, 19],
        backgroundColor: [
        "rgba(0, 123, 255,0.9)",
        "rgba(0, 123, 255,0.8)",
        "rgba(0, 123, 255,0.7)",
        "rgba(0,0,0,0.2)",
        "rgba(0, 123, 255,0.5)"
        ]

      }],
      labels: [
      "Green",
      "Green",
      "Green",
      "Green"
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true
    }
  });
}

} catch (error) {
  console.log(error);
}

try {

// single bar chart
var ctx = document.getElementById("singelBarChart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
      datasets: [
      {
        label: "My First dataset",
        data: [40, 55, 75, 81, 56, 55, 40],
        borderColor: "rgba(0, 123, 255, 0.9)",
        borderWidth: "0",
        backgroundColor: "rgba(0, 123, 255, 0.5)"
      }
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      scales: {
        xAxes: [{
          ticks: {
            fontFamily: "Poppins"

          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            fontFamily: "Poppins"
          }
        }]
      }
    }
  });
}

} catch (error) {
  console.log(error);
}

})(jQuery);



(function ($) {
// USE STRICT
"use strict";
var navbars = ['header', 'aside'];
var??hrefSelector??=??'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])';
var linkElement = navbars.map(element => element + ' ' + hrefSelector).join(', ');
$(".animsition").animsition({
  inClass: 'fade-in',
  outClass: 'fade-out',
  inDuration: 900,
  outDuration: 900,
  linkElement: linkElement,
  loading: true,
  loadingParentElement: 'html',
  loadingClass: 'page-loader',
  loadingInner: '<div class="page-loader__spin"></div>',
  timeout: false,
  timeoutCountdown: 5000,
  onLoadEvent: true,
  browser: ['animation-duration', '-webkit-animation-duration'],
  overlay: false,
  overlayClass: 'animsition-overlay-slide',
  overlayParentElement: 'html',
  transition: function (url) {
    window.location.href = url;
  }
});


})(jQuery);
(function ($) {
// USE STRICT
"use strict";

// Map
try {

  var vmap = $('#vmap');
  if(vmap[0]) {
    vmap.vectorMap( {
      map: 'world_en',
      backgroundColor: null,
      color: '#ffffff',
      hoverOpacity: 0.7,
      selectedColor: '#1de9b6',
      enableZoom: true,
      showTooltip: true,
      values: sample_data,
      scaleColors: [ '#1de9b6', '#03a9f5'],
      normalizeFunction: 'polynomial'
    });
  }

} catch (error) {
  console.log(error);
}

// Europe Map
try {

  var vmap1 = $('#vmap1');
  if(vmap1[0]) {
    vmap1.vectorMap( {
      map: 'europe_en',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      enableZoom: true,
      showTooltip: true
    });
  }

} catch (error) {
  console.log(error);
}

// USA Map
try {

  var vmap2 = $('#vmap2');

  if(vmap2[0]) {
    vmap2.vectorMap( {
      map: 'usa_en',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      enableZoom: true,
      showTooltip: true,
      selectedColor: null,
      hoverColor: null,
      colors: {
        mo: '#001BFF',
        fl: '#001BFF',
        or: '#001BFF'
      },
      onRegionClick: function ( event, code, region ) {
        event.preventDefault();
      }
    });
  }

} catch (error) {
  console.log(error);
}

// Germany Map
try {

  var vmap3 = $('#vmap3');
  if(vmap3[0]) {
    vmap3.vectorMap( {
      map: 'germany_en',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      onRegionClick: function ( element, code, region ) {
        var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

        alert( message );
      }
    });
  }

} catch (error) {
  console.log(error);
}

// France Map
try {

  var vmap4 = $('#vmap4');
  if(vmap4[0]) {
    vmap4.vectorMap( {
      map: 'france_fr',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      enableZoom: true,
      showTooltip: true
    });
  }

} catch (error) {
  console.log(error);
}

// Russia Map
try {
  var vmap5 = $('#vmap5');
  if(vmap5[0]) {
    vmap5.vectorMap( {
      map: 'russia_en',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      hoverOpacity: 0.7,
      selectedColor: '#999999',
      enableZoom: true,
      showTooltip: true,
      scaleColors: [ '#C8EEFF', '#006491' ],
      normalizeFunction: 'polynomial'
    });
  }


} catch (error) {
  console.log(error);
}

// Brazil Map
try {

  var vmap6 = $('#vmap6');
  if(vmap6[0]) {
    vmap6.vectorMap( {
      map: 'brazil_br',
      color: '#007BFF',
      borderColor: '#fff',
      backgroundColor: '#fff',
      onRegionClick: function ( element, code, region ) {
        var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
        alert( message );
      }
    });
  }

} catch (error) {
  console.log(error);
}
})(jQuery);
(function ($) {
// Use Strict
"use strict";
try {
  var progressbarSimple = $('.js-progressbar-simple');
  progressbarSimple.each(function () {
    var that = $(this);
    var executed = false;
    $(window).on('load', function () {

      that.waypoint(function () {
        if (!executed) {
          executed = true;
          /*progress bar*/
          that.progressbar({
            update: function (current_percentage, $this) {
              $this.find('.js-value').html(current_percentage + '%');
            }
          });
        }
      }, {
        offset: 'bottom-in-view'
      });

    });
  });
} catch (err) {
  console.log(err);
}
})(jQuery);
(function ($) {
// USE STRICT
"use strict";

// Scroll Bar
try {
  var jscr1 = $('.js-scrollbar1');
  if(jscr1[0]) {
    const ps1 = new PerfectScrollbar('.js-scrollbar1');      
  }

  var jscr2 = $('.js-scrollbar2');
  if (jscr2[0]) {
    const ps2 = new PerfectScrollbar('.js-scrollbar2');

  }

} catch (error) {
  console.log(error);
}

})(jQuery);
(function ($) {
// USE STRICT
"use strict";

// Select 2
try {

  $(".js-select2").each(function () {
    $(this).select2({
      minimumResultsForSearch: 20,
      dropdownParent: $(this).next('.dropDownSelect2')
    });
  });

} catch (error) {
  console.log(error);
}


})(jQuery);
(function ($) {
// USE STRICT
"use strict";

// Dropdown 
try {
  var menu = $('.js-item-menu');
  var sub_menu_is_showed = -1;

  for (var i = 0; i < menu.length; i++) {
    $(menu[i]).on('click', function (e) {
      e.preventDefault();
      $('.js-right-sidebar').removeClass("show-sidebar");        
      if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
        $(this).toggleClass('show-dropdown');
        sub_menu_is_showed = -1;
      }
      else {
        for (var i = 0; i < menu.length; i++) {
          $(menu[i]).removeClass("show-dropdown");
        }
        $(this).toggleClass('show-dropdown');
        sub_menu_is_showed = jQuery.inArray(this, menu);
      }
    });
  }
  $(".js-item-menu, .js-dropdown").click(function (event) {
    event.stopPropagation();
  });

  $("body,html").on("click", function () {
    for (var i = 0; i < menu.length; i++) {
      menu[i].classList.remove("show-dropdown");
    }
    sub_menu_is_showed = -1;
  });

} catch (error) {
  console.log(error);
}

var wW = $(window).width();
// Right Sidebar
var right_sidebar = $('.js-right-sidebar');
var sidebar_btn = $('.js-sidebar-btn');

sidebar_btn.on('click', function (e) {
  e.preventDefault();
  for (var i = 0; i < menu.length; i++) {
    menu[i].classList.remove("show-dropdown");
  }
  sub_menu_is_showed = -1;
  right_sidebar.toggleClass("show-sidebar");
});

$(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
  event.stopPropagation();
});

$("body,html").on("click", function () {
  right_sidebar.removeClass("show-sidebar");

});


// Sublist Sidebar
try {
  var arrow = $('.js-arrow');
  arrow.each(function () {
    var that = $(this);
    that.on('click', function (e) {
      e.preventDefault();
      that.find(".arrow").toggleClass("up");
      that.toggleClass("open");
      that.parent().find('.js-sub-list').slideToggle("250");
    });
  });

} catch (error) {
  console.log(error);
}


try {
// Hamburger Menu
$('.hamburger').on('click', function () {
  $(this).toggleClass('is-active');
  $('.navbar-mobile').slideToggle('500');
});
$('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
  var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
  $(this).toggleClass('active');
  $(dropdown).slideToggle('500');
  return false;
});
} catch (error) {
  console.log(error);
}
})(jQuery);
(function ($) {
// USE STRICT
"use strict";

// Load more
try {
  var list_load = $('.js-list-load');
  if (list_load[0]) {
    list_load.each(function () {
      var that = $(this);
      that.find('.js-load-item').hide();
      var load_btn = that.find('.js-load-btn');
      load_btn.on('click', function (e) {
        $(this).text("Loading...").delay(1500).queue(function (next) {
          $(this).hide();
          that.find(".js-load-item").fadeToggle("slow", 'swing');
        });
        e.preventDefault();
      });
    })

  }
} catch (error) {
  console.log(error);
}

})(jQuery);
(function ($) {
// USE STRICT
"use strict";

try {

  $('[data-toggle="tooltip"]').tooltip();

} catch (error) {
  console.log(error);
}

// Chatbox
try {
  var inbox_wrap = $('.js-inbox');
  var message = $('.au-message__item');
  message.each(function(){
    var that = $(this);

    that.on('click', function(){
      $(this).parent().parent().parent().toggleClass('show-chat-box');
    });
  });


} catch (error) {
  console.log(error);
}

})(jQuery);