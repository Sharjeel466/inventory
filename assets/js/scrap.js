$.ajax({
  url: 'db-stock.php',
  success: function(data){
    var data = JSON.parse(data);
    var html = ``;
    html +=`<div class="row">
    <div class="form-group col-md-6">
    <label>Product-1</label>
    <select class="form-control inventory">`;
    $.each(data, function(index, value){
        html += `<option value=${value.id}>${value.product_name}</option>`;
    })
    html += `</select>
    </div>
    </div>`;
    console.log(html);
  }
});
// html += '<div class="row">'+
//       '<div class="form-group col-md-6">'+
//       '<label>Product-'+i+'</label>'+
//       '<select class="form-control inventory '+i+'">'+
//       '</select>'+
//       '</div>'+
//       '<div class="form-group col-md-6">'+
//       '<label>Quantity</label>'+
//       '<input type="text" class="form-control" placeholder="Quantity">'+
//       '</div>'+
//       '</div>';