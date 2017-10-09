$(document).ready(function(){

  /*fix the navbar in the top during scrolling*/
  $('body').scrollspy({
  	target: '#nav-left-link',
  	offset: 70,
	});

  /*change the color and the content of the skill circle*/
  $(".skill-detail").hover(
    function(){
      $inner = $(this).find('h4').text();
 	  	$(this).css("background-color", "green");
    	$(this).find('h4').text("+");
    }, function(){
    	$(this).css("background-color", "#595959");
    	$(this).find('h4').text($inner);
	  }, 'slow');

  /*customize the alert box size, shape and content.*/
  var currentCallback;

  $(function(){

	  $('.confirmButton').click(function(){
      $('#messageAlert').css('display', 'none');
      currentCallback();
    })

    $('.skill-detail').click(function(){
    	var skillDetail = $(this).find('p').text();
  	  var skillDetailPart1;
    	var skillDetailPart2;
  	
  	  if(skillDetail.length < 200) {
  	  	skillDetailPart1 = skillDetail;
  	   	skillDetailPart2 = null;
  	  }
  	  else {
  	   	var middle = Math.floor(skillDetail.length / 2);
		    var before = skillDetail.lastIndexOf('.', middle);
		    var after  = skillDetail.indexOf('.', middle + 1);

		    if (middle - before < after - middle) {
    	    middle = before;
		    } else {
    	    middle = after;
		    }

		    skillDetailPart1 = skillDetail.substr(0, middle);
		    skillDetailPart2 = skillDetail.substr(middle + 1);
  	  }

      alert($inner, skillDetailPart1, skillDetailPart2, function(){
    	  console.log("Callback executed");
      })
    });
  });

  window.alert = function(title, msg1, msg2, callback){
	
	  $('#alertTitle').text(title);
    	$('#detail1').text(msg1);
 	  $('#detail2').text(msg2);
  	  $('#messageAlert').css('display', 'inline');
  }

});