const gearApp= {

}

// gearApp.getPieces =function(query) {

	$.ajax({
	url: 'https://tsv.amsnetwork.ca/api/v3/assets?type=Equipment&per_page=600',
	type: 'GET',
	beforeSend: function (xhr) {
	    xhr.setRequestHeader('Authorization', 'Bearer e250cc61ae026bc9ad3c4c616c06b4cf99018fee7a6da149fc3528e591bf77d4');
	},
	data: {
	},
	success: function (res) { 
		console.log(res.assets);
		$.each(res, function(index, value) {  
			for(var i=0; i<1000; i++){
				var available =value[i].status_text;
				var name = value[i].name;
				var catagory = value[i].category_name;
				if (catagory === "Lights") {
					console.log (name);
					 $('.output').append('<div>'+name+'</div>');
				}
				// 
				// console.log (name);
				// $('.output').append(name);

			}
			
		});

	},
	error: function () { },
	}).then(function(res) {



  // console.log(res.assets);
  // $('gearList').empty();
  // gearApp.displayPieces(res.assets);

  	// console.log(i);

  	
    
     
   
    
    
    // var bio = value.user.bio;
    // var imageURL = value.urls.regular;
    
    // $('.name').text(name);
    // $('.bio').text(bio);
    // $('.image img').attr('src', imageURL);
    
 
});



// };

// gearApp.displayPieces = function(data){
// 	const gearHTML = data.filter((gearObj) => gearObj.photo).map((gearObj) => {
// 		let gearPieces = `${gearObj.title}`;
// 		return gearPieces;
// 	}).join('');
// 	$('#gearList').append(gearPieces);
// 	console.log(gearPieces)
// }



$(function(){

	// console.log("It's working");

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