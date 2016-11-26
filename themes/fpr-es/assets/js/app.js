window.namespace = (function (module, $) {
    "use strict";

    module.ModuleName = function() {

    };

    module.GoogleMaps = function(){
    	if($('#map-canvas').length == 0){
    		return;
    	}

    	function initialize() {
	        var mapOptions = {
	          center: new google.maps.LatLng(-34.397, 150.644),
	          zoom: 8
	        };
	        var map = new google.maps.Map(document.getElementById("map-canvas"),
	            mapOptions);

			var markerBounds = new google.maps.LatLngBounds();

			var infowindow = new google.maps.InfoWindow({
				content: ""
			});


			var markers = [];
	        
	        for(var i = 0; i < familyCareCenters.length; i++){

	        	var locationLatLng =  new google.maps.LatLng(familyCareCenters[i].lat, familyCareCenters[i].lng);
				markerBounds.extend(locationLatLng);

				var contentString = '<div class="article article--map">' +
										'<h3 class="article_title">' + familyCareCenters[i].location + '</h3>' +
										'<div class="article_subtitle">' + familyCareCenters[i].people + '</div>' +
										'<p>' +
											familyCareCenters[i].description +
										'</p><p>' +
												'<a href="mailto:' + familyCareCenters[i].email + '">' + familyCareCenters[i].email + '</a><br />' +
												'<a href="' + familyCareCenters[i].web + '">' + familyCareCenters[i].web + '</a>' +
										'</p>' +
									'</div>';

				
				var marker = new google.maps.Marker({
				    position: locationLatLng,
				    map: map,
				    title: familyCareCenters[i].location,
				    text: contentString
				});

				markers.push(marker);

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(this.text);
			    	infowindow.open(map,this);
			  	});
	        }
	        
			map.fitBounds(markerBounds);

	      }

	      google.maps.event.addDomListener(window, 'load', initialize);
	};

	module.LocationMap = function(){
		if($('.location-map').length == 0){
			return;
		}
		var $map = $('.location-map');

		var markerLatLng = {
			lat: $map.data('lat'),
			lng: $map.data('lng'),
			el: $map[0]
		};

		console.log(markerLatLng);

		module.InitMapWithMarker(markerLatLng)
	};

	module.InitMapWithMarker = function(markerLatLng){
		function initialize() {
	        var mapOptions = {
	          center: new google.maps.LatLng(markerLatLng.lat, markerLatLng.lng),
	          zoom: 12
	        };
	        var map = new google.maps.Map(markerLatLng.el, mapOptions);

	        var locationLatLng =  new google.maps.LatLng(markerLatLng.lat, markerLatLng.lng);

			var marker = new google.maps.Marker({
			    position: locationLatLng,
			    map: map,
			});
	      }

	      google.maps.event.addDomListener(window, 'load', initialize);
	};

    module.GetYoutubeVideos = function (argument) {
		function displayVideos(data){
			var htmlString = "";
			console.log(data.feed.entry);
			$(data.feed.entry).each(function(entry){
				var url = this.link[0].href;
				var url_thumbnail = this.media$group.media$thumbnail[3].url;
				var description = this.media$group.media$description.$t;
				var title = this.title.$t;
				
				htmlString += '<div class="media youtube">' +
									'<a href="' + url + '" target="_blank"><img src="' + url_thumbnail + '" alt="' + description + '" class="media_object youtube_img"></a>' +
									'<div class="media_body">' +
										'<h3 class="article_title gamma">' + title + '</h3>' +
									'</div>' +
								'</div>';
			});

			$("#youtube-channel").html(htmlString);
		}

		if($('#youtube-channel').length == 0){
			return;
		}


		$.ajax({
			type: "GET",
			url: "http://gdata.youtube.com/feeds/users/fprpl/uploads?alt=json&format=5&max-results=3",
			cache: false,
			dataType:'jsonp',
			success: function(data){

				displayVideos(data);
		  }
		});
    }

    module.FixedFooter = function(){
    	$('.fpr-page').css('padding-bottom', $('.footer').outerHeight() + 'px');
    };

    module.MobileMenu = function(){
        $('.js-mobile-nav-trigger').click(function(e){
            e.preventDefault();
            console.log('test');
            $('.nav_mobile').toggleClass('nav_mobile--is-open')
            $('.nav_inner').slideToggle(500);

        });
    };

    module.ReadMore = function () {
    	if($('.read-more').length == 0){
    		return;
    	}

    	$('.read-more').each(function(index, item){
    		var $this = $(this);

    		if($this.outerHeight() > 150){
    			$this.wrapInner( "<div class='read-more_inner'></div>");
    			$this.append('<div class="read-more_cta"><a href="#read-more">Read more</a></div>');

    			$this.on('click', '.read-more_cta a', function(e){
    				var $cta = $(this);
    				e.preventDefault();
    				if($this.hasClass('read-more--is-open')){
    					$('.read-more_inner', $this).animate({maxHeight: "150px"}, 400, function(){
							$this.removeClass('read-more--is-open');
							$cta.text('Read more');
    					});
						
    				}else{
    					$('.read-more_inner', $this).animate({maxHeight: "9999px"}, 400, function(){
							$this.addClass('read-more--is-open');
    						$cta.text('Read less');
    					});
    					
    				}
    				
    			});
    		}
    	});
    };

    module.ShareButtons = function() {
        $(document).on('click', '.share-facebook', function(e) {
            window.open(
                $(this).attr('href'),
                'facebook-share-dialog',
                'width=626,height=436');
            return false;
        });

        $(document).on('click', '.share-twitter', function(e) {
            window.open(
                $(this).attr('href'),
                'twitter-share-dialog',
                'width=575,height=400');
            return false;
        });
    };

    $(document).ready(function () {      
        module.ModuleName();
        module.GetYoutubeVideos();
        module.GoogleMaps();
        module.LocationMap();
        module.FixedFooter();
        module.MobileMenu();
        module.ReadMore();
        module.ShareButtons();
    });

    return module;
})(window.namespace || {}, window.jQuery);

// make it safe to use console.log always
(function (b) { function c() { } for (var d = "assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","), a; a = d.pop() ;) { b[a] = b[a] || c } })((function () {
    try
    { console.log(); return window.console; } catch (err) { return window.console = {}; }
})());