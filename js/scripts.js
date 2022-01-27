$(function(){

	// console.log("It's working");
	$.ajax({
	url: 'https://tsv.amsnetwork.ca/api/v3/assets?type=Equipment&per_page=600',
	type: 'GET',
	beforeSend: function (xhr) {
	    xhr.setRequestHeader('Authorization', 'Bearer e250cc61ae026bc9ad3c4c616c06b4cf99018fee7a6da149fc3528e591bf77d4');
	},
	data: {},
	success: function () { },
	error: function () { },
	}).then(function(res) {
  console.log(res);


});
//   if($('ul#archiveEach').children.length === 1) { 
//     $("ul#archiveEach li").css("background", "#F00");
//   }


$('ul#archiveEach').each(function() {
  var $this = $(this);
  if ($this.find('li').length < 2) { //if looking for direct descendants then do .children('div').length
      $this.addClass('moreThanOne');
  }
});
});
// var each = document.getElementById('archiveEach').getElementsByTagName('li');


// $(each).length >= 1 {
// 	$('.archiveMain').find('ul').addClass('more');
// };