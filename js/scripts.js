$(function(){
var gear;


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
			$('.output').empty();

		// window.myvar = res.assets;
		// var gear;
		let gear = 'Cameras';
		$.each(res, function(index, value) { 
			$("#gearOptions").on("change", function(){
				console.log('test');
				$('.output').empty();
				const choice = $('select option:selected').text();
				$('#page-title').text(choice);
			  var gearUpdate = $(this).val();
			  var gear = gearUpdate;
			  console.log(gear);			for(var i=0; i<1000; i++){
				var available =value[i].status_text;
				var name = value[i].name;
				var catagory = value[i].category_name;
				var image = value[i].photo_medium;
				var description = value[i].description;
				var external_url_resources = value[i].external_url_resources;
				var included_accessories = value[i].included_accessories;
				let price =  value[i].price_types;
				// var priceDay = parseInt(price.replace(/[^0-9\.]/g, ''), 10);


				if ((catagory === gear) && (available === 'Active') ) {
				var priceDay = parseInt(price.toString().replace(/[^0-9\.]/g, ''));
				var PriceDayOne = priceDay * 1;
				var priceWeek = priceDay * 3;
				var priceMonth = priceDay * 16;

					 $('.output').append('<article class="gearEach"><section class="gearEachInner"><h2>'+ name +'</h2><img src="'+image+'"><section class="pricesection"><section class="priceDay">$'+priceDayOne+'/DAY</section><section class="priceweek">$'+priceWeek+'/WEEK</section><section class="priceMonth">$'+priceMonth+'/MONTH</section></section><button class="specsAvail">Specs & Availability</button></section><section class="gearEachMore"><section class="descriptionGear"><h4>Description</h4>'+description+'</section><section class="accInc"><h4>Accessories Included</h4>'+included_accessories+'</section><a href="'+external_url_resources+'" target="_blank">Additional Gear Information(PDF)</a></section></article>' );
				}
				// 
				// console.log (name);
				// $('.output').append(name);

			}

			  
			  // gearApp.getPieces(gear);
			  // gearApp.updateTitle();
			});
			for(var i=0; i<1000; i++){
				var available =value[i].status_text;
				var name = value[i].name;
				var catagory = value[i].category_name;
				var image = value[i].photo_medium;
				var description = value[i].description;
				var external_url_resources = value[i].external_url_resources;
				var included_accessories = value[i].included_accessories;
				let price =  value[i].price_types;

				if ((catagory === gear) && (available === 'Active') ) {
				var priceDay = parseInt(price.toString().replace(/[^0-9\.]/g, ''));
				var priceDayOne = priceDay * 1;
				var priceWeek = priceDay * 3;
				var priceMonth = priceDay * 16;
					 $('.output').append('<article class="gearEach"><section class="gearEachInner"><h2>'+ name +'</h2><img src="'+image+'"><section class="pricesection"><section class="priceDay">$'+priceDayOne+'/DAY</section><section class="priceweek">$'+priceWeek+'/WEEK</section><section class="priceMonth">$'+priceMonth+'/MONTH</section></section><button class="specsAvail">Specs & Availability</button></section><section class="gearEachMore"><section class="descriptionGear"><h4>Description</h4>'+description+'</section><section class="accInc"><h4>Accessories Included</h4>'+included_accessories+'</section><a href="'+external_url_resources+'" target="_blank">Additional Gear Information(PDF)</a></section></article>' );
				}

				// 
				// console.log (name);
				// $('.output').append(name);

			}
			
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

				// $("button.specsAvail").each(function(){
				//   $(this).click(function() {
				//   $('.gearEach').find(".gearEachMore").toggle(1000);
				//   console.log('test');
				//  }); 

				// });
$('.gearEach').on('click', 'button.specsAvail', function() {
	console.log('fuck');
});
//access menu 
$('.access').on('click',function(){
	$('.accessMenu').toggle();
});

if (localStorage.getItem('screenModeSaturateTokenState') == 'desaturate') {
   $('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu .current-menu-item, #menu-header-menu .current-menu-parent, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select').addClass('whiteAll');

  }
if (localStorage.getItem('fontSizeRange') == 'userinput') {
   JSON.stringify($('#fontSizeRange').val());

  }


$("#fontSizeRange").on("input", function () {
	localStorage.setItem("fontSizeRange", 'userinput');
  $("body").css("font-size", $(this).val() + "px");
  $("h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", $(this).val() + "px");
  $('.smallA').css("font-size",'.9rem');
  console.log($(this).val());
});
$('.desaturateMenu').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'desaturate');
	$('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu .current-menu-item, #menu-header-menu .current-menu-parent, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select').addClass('whiteAll');


});
$('.clearInputs').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'normal');
	localStorage.setItem('fontSizeTokenState', 'normal');
	$("body,h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", '.9rem');
	$('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu .current-menu-item, #menu-header-menu .current-menu-parent, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select').removeClass('whiteAll');
	$('#fontSizeRange').val('0');


})

// $('.darkModeButton').on('click',function(){
// 	$('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu .current-menu-item, #menu-header-menu .current-menu-parent, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select').addClass('blackAll');
// 	$('body').addClass('whiteText');


// });





});