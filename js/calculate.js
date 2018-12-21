jQuery("#price").keyup(function()
	{
		var valAc = jQuery(this).val();
		if(valAc.indexOf(".")  != -1 ){
			valAc = valAc.replace(/[.]/g,'');
		}
		var datFro = formatMoney(valAc);
		jQuery(this).val(datFro);
    //Balance
    var num_hitch = jQuery('#num_hitch').html();
    var num_balance = parseFloat(valAc-num_hitch);
    num_balance = formatMoney(num_balance);
    jQuery('#num_balance').html(num_balance);
    jQuery('#num_term').prop('selectedIndex',0);
   });
    //Term
    jQuery("#num_term").change(function(e){
      var term = jQuery(this).val();
      e.preventDefault();
  		jQuery.ajax({
  			url : cms_vars.ajaxurl,
  			type: 'post',
  			data: {
  				action : 'ajax_calculator',
  				term: term
  			},
        success: function(data) {
          var num_balance = jQuery('#num_balance').html();
          if(num_balance.indexOf(".")  != -1 ){
            num_balance = num_balance.replace(/[.]/g,'');
          }
          if(data.indexOf(".")  != -1 ){
            data = data.replace(/[.]/g,'');
          }
          var share = data*num_balance;
          jQuery('.alert_cal').remove();
          if(share<100){
            var alert = "<div class='alert_cal'>Cuota no autorizada</div>";
            jQuery('#cont-calculator').append(alert);
          }
          share = formatMoney(share);
          share = parseFloat(share);
          jQuery('#share_value').html(share);
          num_balance = formatMoney(num_balance);
          jQuery('#pay_value').html(num_balance);
				}
  		});
    });
//admin
jQuery(".val_term").keyup(function()
	{
    var valTerm = jQuery(this).val();
    if(valTerm.indexOf(".")  != -1 ){
      valTerm = valTerm.replace(/[.]/g,'');
    }
    if(valTerm.indexOf(",")  != -1 ){
      valTerm = valTerm.replace(/[,]/g,'');
    }
    valTerm = formatMoney(valTerm);
    jQuery(this).val(valTerm);
  });

function formatMoney(num){
  num = String(num);
  return num.replace(/./g, function(c, i, a) {
      return i && c !== "." && ((a.length - i) % 3 === 0) ? '.' + c : c;
  });
}
