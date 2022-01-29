// const gearApp= {

// }

// gearApp.getPieces =function(query) {







$(function(){
var data ='';
console.log(data);

	$.ajax({
	url: 'https://tsv.amsnetwork.ca/api/v3/assets?type=Equipment&per_page=600',
	type: 'GET',
	beforeSend: function (xhr) {
	    xhr.setRequestHeader('Authorization', 'Bearer ');
	},
	data: {
	},
	success: function (res) { 
		console.log(res.assets);
		window.myvar = res.assets;
		$("#gearOptions").on("change", function(){
			$('.output').empty();
			const choice = $('select option:selected').text();
			$('#page-title').text(choice);
		  var gear = $(this).val();
		  $.each(res, function(index, value) {  
		  	for(var i=0; i<1000; i++){
		  		var available =value[i].status_text;
		  		var name = value[i].name;
		  		var catagory = value[i].category_name;
		  		var image = value[i].photo_medium;
		  		var description = value[i].description;
		  		var external_url_resources = value[i].external_url_resources;
		  		var included_accessories = value[i].included_accessories;
		  		var price = value[i].price_types[0];

		  		if ((catagory === gear) && (available === 'Active') ) {
		  			console.log (name);
		  			 $('.output').append('<article class="gearEach"><h2>'+ name +'</h2><img src="'+image+'"><section className="pricesection">'+price+'</section></article>' );
		  		}
		  		// 
		  		// console.log (name);
		  		// $('.output').append(name);

		  	}
		  	
		  });
		  
		  // gearApp.getPieces(gear);
		  // gearApp.updateTitle();
		});


	},
	error: function () { },
	}).then(function() {

    
 
});


$('ul#archiveEach').each(function() {
  var $this = $(this);
  if ($this.find('li').length < 2) { 
      $this.addClass('moreThanOne');
  }
});
});

