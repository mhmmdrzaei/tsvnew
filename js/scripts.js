
"use strict"; 


$(function(){

		$.ajax({
		url: 'https://tsv.amsnetwork.ca/api/v3/assets?type=Equipment&per_page=600',
		type: 'GET',
		beforeSend: function (xhr) {
		    xhr.setRequestHeader('Authorization', 'Bearer ');
		},
		data: {
		},
		success: function (res) { 
			// console.log(res.assets);
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
					var description = value[i].description || '';
					var external_url_resources = value[i].external_url_resources;
					var included_accessories = value[i].included_accessories || '';
					let price =  value[i].price_types;

					// var priceDay = parseInt(price.replace(/[^0-9\.]/g, ''), 10);


					if ((catagory === gear) && (available === 'Active') ) {
					var priceDay = parseInt(price.toString().replace(/[^0-9\.]/g, ''));
					var PriceDayOne = priceDay * 1;
					var priceWeek = priceDay * 3;
					var priceMonth = priceDay * 16;
					var artPieceHtml = `
					  <article class="gearEach">
					  <section class="gearEachInner">
					    <h2>${name}</h2>
					    <figure><img src="${image}"></figure>
					    <section class="pricesection">
					      <section class="priceDay">$${priceDay}/DAY</section>
					      <section class="priceweek">$${priceWeek}/WEEK</section>
					      <section class="priceMonth">$${priceMonth}/MONTH</section>
					    </section>
					    <button class="specsAvail">More Information</button>
					  </section>  
					  	 <section class="gearEachMore">
					  	 <section class="gearMoreInner">
					  	 	<section class="gearTitle">
					  	 		<h2>${name}</h2>
					  	 		<span>X</span>
					  	 	</section>
					  	 	<figure><img src="${image}"></figure>
					  	 	<section class="gearinfoDesc">
					  	 	${description ?`<section class="descriptionGear">
					  	 	<h4>Description:</h4>${description}</section>` : ''} 
					  	 	${included_accessories ?`<section class="accInc">
					  	 	<h4>Accessories Included:</h4>${included_accessories}</section>` : ''} 
					  	 	${external_url_resources ? `<a href="${external_url_resources}" target="_blank">Additional Gear Information</a>` : ''}
					  	 	
					  	 	<button class="openGCF">Open Gear Rental Request Form</button>
					  	 	</section>


					  	 </section>
					   
					   </section>
					      
					  </article>  

					    `;

						 $('.output').append(artPieceHtml);
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
					var description = value[i].description || '';
					var external_url_resources = value[i].external_url_resources || '';
					var external_two = `<a href="${external_url_resources}" target="_blank">Additional Gear Information</a>` || '';
					var included_accessories = value[i].included_accessories || '';
					// var fullAccessories = `Hello ${included_accessories ? included_accessories : 'unknown'}`;
					let price =  value[i].price_types;

					if ((catagory === gear) && (available === 'Active') ) {
					var priceDay = parseInt(price.toString().replace(/[^0-9\.]/g, ''));
					var PriceDayOne = priceDay * 1;
					var priceWeek = priceDay * 3;
					var priceMonth = priceDay * 16;
					var artPieceHtml = `
					  <article class="gearEach">
					  <section class="gearEachInner">
					    <h2>${name}</h2>
					    <figure><img src="${image}"></figure>
					    <section class="pricesection">
					      <section class="priceDay">$${priceDay}/DAY</section>
					      <section class="priceweek">$${priceWeek}/WEEK</section>
					      <section class="priceMonth">$${priceMonth}/MONTH</section>
					    </section>
					    <button class="specsAvail">More Information</button>
					  </section>  
					  	 <section class="gearEachMore">
					  	 <section class="gearMoreInner">
					  	 	<section class="gearTitle">
					  	 		<h2>${name}</h2>
					  	 		<span>X</span>
					  	 	</section>
					  	 	<figure><img src="${image}"></figure>
					  	 	<section class="gearinfoDesc">
					  	 	${description ?`<section class="descriptionGear">
					  	 	<h4>Description:</h4>${description}</section>` : ''} 
					  	 	${included_accessories ?`<section class="accInc">
					  	 	<h4>Accessories Included:</h4>${included_accessories}</section>` : ''} 
					  	 	${external_url_resources ? `<a href="${external_url_resources}" target="_blank">Additional Gear Information</a>` : ''}
					  	 	
					  	 	<button class="openGCF">Open Gear Rental Request Form</button>
					  	 	</section>


					  	 </section>
					   
					   </section>
					      
					  </article>  

					    `;

						 $('.output').append(artPieceHtml);
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

	$(document).on('click', '.gearEach', function(){ 
    $(this).find('.gearEachMore').toggleClass('gearOpen');

	}); 
	$(document).on('click', '.gearTitle', function(){ 
		$(this).find().parents().eq(1).removeClass('gearOpen');
    
	}); 

	$(document).on('click', '.openGCF', function(){ 
	
	if ($('.gearRequestFields').hasClass('openForm')) {

	} else {
		$('.gearRequestFields').addClass('openForm');
	}
    // $('.gearRequestFields').toggleClass('openForm');
    $('html, body').animate({
         scrollTop: $("#gearRental").offset().top
     }, 1000);

	}); 

	$(document).on('click', '.copyName', function(){ 
		value = $(this).data('clipboard-text'); 
		console.log(value);
		// value = $(this).data('clipboard-text'); 
		// Temporary input tag to store text
		var $temp = $("<input>");
		$("body").append($temp);
		// Selects text value
		$temp.val(value).select();
		// Copies text, removes temporary tag
		document.execCommand("copy");
		$temp.remove();
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
	$(this).addClass('isOpen');
	$('.accessMenu').toggle();
	if ( $('.access').hasClass( "isOpen" ) ) {
			$(this).on('click',function(){
				$(this).removeClass('isOpen');
				window.location.reload();
			})

			
		}

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
     $('body, h1.pageTitle, h2, h3, h4, h5, h6, a, .access, .desaturate, .clearInputs').css('font-size', curFontSize);
}

$(".increaseFont,.decreaseFont").click(function () {
    var type = $(this).val();
    curFontSize = $('body, h1.pageTitle, h2, h3, h4, h5, h6, a, .access , .desaturate, .clearInputs').css('font-size'); 
   // if () {
    if ((type == 'increase')&& (parseInt(curFontSize) < 25)) {
        $('body, h1.pageTitle, h2, h3, h4, h5, h6, a, .access, .desaturate, .clearInputs').css('font-size', parseInt(curFontSize) + 1 + "px");
         // $('.desaturate, .clearInputs').css('font-size', '.9rem');

    } else if((type == 'decrease')&& (parseInt(curFontSize) > 15)) {
        $('body, h1.pageTitle, h2, h3, h4, h5, h6, a, .access, .desaturate, .clearInputs').css('font-size', parseInt(curFontSize) - 1 + "px");
         // $('.desaturate, .clearInputs').css('font-size', '.9rem');
    }
    localStorage.setItem('FontSize', curFontSize);
});



if (localStorage.getItem('screenModeSaturateTokenState') == 'desaturate') {
   $('body, h1, h2, h3, h4, .bios .bioEach h4, .membershipOptionBox .membershipBoxPrice, .fullwidthpost h2, .postMainContent .postMainInnerContentFull .tagList a, select, .registerLink, .gearEachInner h2, .specsAvail').addClass('whiteAll');
   $('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button, .openWSHome, #menu-header-menu .current_page_ancestor,.fullWSHome,.current-menu-item, .lds-roller div').addClass('blackBack');

  }


$('.desaturateMenu').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'desaturate');
	$('body, h1, h2, h3, h4, .bios .bioEach h4, .membershipOptionBox .membershipBoxPrice, .fullwidthpost h2, .postMainContent .postMainInnerContentFull .tagList a, select, .registerLink, .gearEachInner h2, .specsAvail').addClass('whiteAll');
	$('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button, .openWSHome, #menu-header-menu .current_page_ancestor, .fullWSHome,.current-menu-item, .lds-roller div ').addClass('blackBack');



});
$('.clearInputs').on('click',function(){
	localStorage.setItem('screenModeSaturateTokenState', 'saturated');
	// localStorage.setItem('FontSize', normalFontSize);
	// $("body,h1.pageTitle, h2, h3, h4, h5, h6, a").css("font-size", '.9rem');
	$('body, h1, h2, h3, button, .button, .membershipOptionBox .membershipBoxPrice, #menu-header-menu, #menu-header-menu, .membershipOptionsTable table thead tr th:nth-child(n+2),.ctaLink, .fullwidthpost h2, .ctaLink, .postMainContent .postMainInnerContent .tagList a, .postMainContent .postMainInnerContentFull .tagList a,#menu-header-menu li:hover, select, .gearEachInner h2, .specsAvail, .registerLink').removeClass('whiteAll');
	$('.tagList a, .postMainContent .postMainInnerContent .tagList a, .ctaLink, .membershipOptionsTable table thead tr th:nth-child(n+2), button, .button ,  #menu-header-menu .current_page_ancestor, .openWSHome, .fullWSHome, .current-menu-item, .lds-roller div').removeClass('blackBack');
	// $('#fontSizeRange').val('0');
	// // curFontSizeNew = 15;å
	// document.getElementById("fontSizeRange").value = curFontSizeNew;
	localStorage.setItem('FontSize', 'normal');
	$('body, h1.pageTitle, h2, h3, h4, h5, h6, a, .access, .desaturate, .clearInputs').css('font-size', '.9rem');

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


if ($(window).width() > 775) {

$('ul.sub-menu li').each( function(){
	var headerMenuWidth = $(this).parents().eq(1).width();
	var totalWidth = (headerMenuWidth + 12);
	// console.log(headerMenuWidth);

	$(this).css({
		'width' : (totalWidth + 'px')
	});

});

}

$('.menuButtonMobile').on('click', function(){
	$('.menuItems').css('display', 'block');
});
$('.close').on('click', function(){
	$('.menuItems').css('display', 'none');
});


var fontSizeCurr = parseFloat($('a').css('font-size'));
if ((fontSizeCurr > 23) && ($(window).width() < 1349)){
	// console.log('test');
	$('#menu-header-menu li').addClass('adjustedMenu');
}

if ((fontSizeCurr > 22) && ($(window).width() < 505)){
	// console.log('test');
	$('.menuheadings').addClass('adjustedMenuHeadings');
}

if ((fontSizeCurr > 19) && ($(window).width() < 1050) && ($(window).width() > 750)){

	$('.inspire').css('width','55%');
	$('.accessMenuCover').css('width','45%');
}

$('.acf-field-6227895a77496 .acf-input input').attr('placeholder', 'Request Start Date');
$('.acf-field-6227898c77497 .acf-input input').attr('placeholder', 'Request End Date');


$('.gearRequestForm h2').on( 'click', function(){
	$('.gearRequestFields').toggleClass('openForm');
});


$("a").on('click', function(event) {

  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {
    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 800, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  } // End if
});




});