$(function(){
var gear;


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
			$('.output').empty();

		// window.myvar = res.assets;
		// var gear;
		let gear = 'Cameras';
		$.each(res, function(index, value) { 
			$("#gearOptions").on("change", function(){
				console.log('test');
				$('.output').empty();
				const choice = $('select option:selected').text();
				// $('#page-title').text(choice);
			  var gearUpdate = $(this).val();
			  var gear = gearUpdate;
			  console.log(gear);			
			  for(var i=0; i<1000; i++){
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

					 $('.output').append('<article class="gearEach"><section class="gearEachInner"><h2>'+ name +'</h2><img src="'+image+'"><section class="pricesection"><section class="priceDay">$'+priceDay+'/DAY</section><section class="priceweek">$'+priceWeek+'/WEEK</section><section class="priceMonth">$'+priceMonth+'/MONTH</section></section><button class="specsAvail">Specs & Availability</button></section><section class="gearEachMore"><section class="descriptionGear"><h4>Description</h4>'+description+'</section><section class="accInc"><h4>Accessories Included</h4>'+included_accessories+'</section><a href="'+external_url_resources+'" target="_blank">Additional Gear Information(PDF)</a></section></article>' );
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
				var PriceDayOne = priceDay * 1;
				var priceWeek = priceDay * 3;
				var priceMonth = priceDay * 16;
					 $('.output').append('<article class="gearEach"><section class="gearEachInner"><h2>'+ name +'</h2><img src="'+image+'"><section class="pricesection"><section class="priceDay">$'+priceDay+'/DAY</section><section class="priceweek">$'+priceWeek+'/WEEK</section><section class="priceMonth">$'+priceMonth+'/MONTH</section></section><button class="specsAvail">Specs & Availability</button></section><section class="gearEachMore"><section class="descriptionGear"><h4>Description</h4>'+description+'</section><section class="accInc"><h4>Accessories Included</h4>'+included_accessories+'</section><a href="'+external_url_resources+'" target="_blank">Additional Gear Information(PDF)</a></section></article>' );
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



var resetFont = $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size','.9rem'); 
// $(".reset").click(function () {
//    	$('.data').css('font-size', resetFont);
// });
    


// var curFontSize= localStorage["FontSize"];
// if (curFontSize){
//     //set to previously saved fontsize if available
//      $('.data').css('font-size', curFontSize);
//      $("body").css("font-size", curFontSize + "px");
//      $("h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", curFontSize + "px");
//      document.getElementById("fontSizeRange").value = parseInt(curFontSize);
// }

// var normalFontSize = localStorage['FontSizeNormal']; 
// if (normalFontSize){
// 	document.getElementById("fontSizeRange").value = 0;
// 	$("body,h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", '.9rem');
// }

// $("#fontSizeRange").on("input", function () {

//     curFontSize = $(this).val();
//     $("body").css("font-size", parseInt(curFontSize) + "px");
//     $("h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", parseInt(curFontSize) + "px");
//     $('.smallA').css("font-size",'.9rem');
//     // document.getElementById("fontSizeRange").value = curFontSize;
//     localStorage.setItem('FontSize', curFontSize);
// });

// if (localStorage.getItem('FontSize') == 'Sized') {

// 	 curFontSize = $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size'); 
// 	// if () {
// 	 if ((type == 'increase')&& (parseInt(curFontSize) < 28)) {
// 	     $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', parseInt(curFontSize) + 1 + "px");

// 	 } else if((type == 'decrease')&& (parseInt(curFontSize) > 15)) {
// 	     $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', parseInt(curFontSize) - 1 + "px");
// 	 }
	

//  }

var curFontSize= localStorage["FontSize"];
if (curFontSize){
    //set to previously saved fontsize if available
     $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', curFontSize);
}

$(".increaseFont,.decreaseFont").click(function () {
    var type = $(this).val();
    curFontSize = $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size'); 
   // if () {
    if ((type == 'increase')&& (parseInt(curFontSize) < 28)) {
        $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', parseInt(curFontSize) + 1 + "px");
         $('.desaturate, .clearInputs').css('font-size', '.9rem');

    } else if((type == 'decrease')&& (parseInt(curFontSize) > 15)) {
        $('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', parseInt(curFontSize) - 1 + "px");
         $('.desaturate, .clearInputs').css('font-size', '.9rem');
    }
    localStorage.setItem('FontSize', curFontSize);
});



if (localStorage.getItem('screenModeSaturateTokenState') == 'desaturate') {
   $('body, h1, h2, h3, h4, .bios .bioEach h4, .membershipOptionBox .membershipBoxPrice, .fullwidthpost h2, .postMainContent .postMainInnerContentFull .tagList a, select, .registerLink, #menu-header-menu .current-menu-item').addClass('whiteAll');
   $('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button, .openWSHome, #menu-header-menu .current_page_ancestor,.fullWSHome').addClass('blackBack');

  }


$('.desaturateMenu').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'desaturate');
	$('body, h1, h2, h3, h4, .bios .bioEach h4, .membershipOptionBox .membershipBoxPrice, .fullwidthpost h2, .postMainContent .postMainInnerContentFull .tagList a, select, .registerLink, #menu-header-menu .current-menu-item').addClass('whiteAll');
	$('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button, .openWSHome, #menu-header-menu .current_page_ancestor, .fullWSHome').addClass('blackBack');



});
$('.clearInputs').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'saturated');
	// localStorage.setItem('FontSize', normalFontSize);
	// $("body,h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", '.9rem');
	$('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu, #menu-header-menu, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select, #menu-header-menu .current-menu-item').removeClass('whiteAll');
	$('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button ,  #menu-header-menu .current_page_ancestor,.fullWSHome').removeClass('blackBack');
	// $('#fontSizeRange').val('0');
	// // curFontSizeNew = 15;å
	// document.getElementById("fontSizeRange").value = curFontSizeNew;
	localStorage.setItem('FontSize', 'normal');
	$('body, h1.pageTitle, h2, h3, h4, h5, h6, a').css('font-size', '.9rem');

});
if ($(window).width() < 750) {
	$('.contact h2').on('click',function(){
		$('.galleryAddress, .officeHours, .galleryHours, .socialLinks').toggle();
		$('.contact').toggleClass('borderBottom');
	});
	$('.footermenu h2').on('click',function(){
		$('#menu-footer-menu').toggle();
		$('.footermenu').toggleClass('borderBottom');
	});
	$('#mc_embed_signup_scroll h2').on('click',function(){
		$('.mc-field-group, .clear').toggle();
		$('.mainlingList').toggleClass('borderBottom');
	});
	$('.funders h2').on('click',function(){
		$('.funderImages').toggle();
		$('.funders').toggleClass('borderBottom');
	});

}

var headerMenuWidth = $("#menu-header-menu li").width();
var totalWidth = (parseInt(headerMenuWidth) + 14);
var firsChildWith = (parseInt(headerMenuWidth) + 12);
var nthChildOdd = (parseInt(headerMenuWidth) + 13);

if (($(window).width() > 775) && ($(window).width() < 1300) ) {

// console.log(totalWidth);
 $("ul.sub-menu li").css({

    'width': (nthChildOdd + 'px')
  });

 $("#menu-header-menu li:nth-child(1) ul.sub-menu li ").css({

    'width': (firsChildWith + 'px')
  });
 $("#menu-header-menu li:nth-child(3) ul.sub-menu li, #menu-header-menu li:nth-child(5) ul.sub-menu li").css({

    'width': (nthChildOdd + 'px')
  });

}

if ($(window).width() > 1300) {
// console.log(totalWidth);
 $("ul.sub-menu li").css({

    'width': (totalWidth + 'px')
  });

 $("#menu-header-menu li:nth-child(1) ul.sub-menu li , #menu-header-menu li:nth-child(5) ul.sub-menu li").css({

    'width': (totalWidth + 'px')
  });

 $("#menu-header-menu li:nth-child(3) ul.sub-menu li").css({

    'width': (nthChildOdd + 'px')
  });

}
$('.menuButtonMobile').on('click', function(){
	$('.menuItems').css('display', 'block');
});
$('.close').on('click', function(){
	$('.menuItems').css('display', 'none');
});


});