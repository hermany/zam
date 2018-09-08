function alert_page(array){
	//console.info(array);
	var tipe = array.tipe;
	var text = array.text;
  var icon = array.icon; 
  var animation_in = array.animation_in; 
  var animation_out =  array.animation_out;
  var time =  array.time;
  var position = array.position; 

  $("body").append("<div class='m-alert m-alert-"+tipe+" animated "+animation_in+" "+position+"'><i class='icon "+icon+"'></i><span class='text'>"+text+"</span></div>");
  $(".alert").removeClass(animation_in);

  setTimeout(function() {
  	// console.log(time);
    $(".m-alert").addClass(animation_out);
    setTimeout(function() {
    	$(".m-alert").remove();
    },450);
  },time);

}	