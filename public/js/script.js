;(function ($, undefined) {
	'use strict';

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var $window           = $(window), // jQuery window
		$preloader        = $('.preloader'), // preloader dom
		$eventsSlider     = $('.events-slider'), // event slider
		$eventsCarousel   = $('.events-carousel'), // event carousel
		$newsFeedCarousel = $('.news-feed-carousel'), // news feed carousel,
		$timers            = $eventsSlider.find('.slider-clock'); // countdown

	var loaderOn = function () {
		$preloader.fadeIn(500);
	};

	var loaderOff = function () {
		$preloader.fadeOut(500);
	}

	// preloader functionality
	$window.on('load', loaderOff);

	// countdown
	$timers.each(function () {
		var $timer = $(this);

		$timer.countdown($timer.attr('data-live-at')).on('update.countdown', function (e) {
			var format = '%H hours, %M mins, %S secs';

			if(e.offset.totalDays > 0) {
				format = '%-d day%!d ' + format;
			}

			if(e.offset.weeks > 0) {
				format = '%-w week%!w ' + format;
			}

			$timer.html(e.strftime(format));
		});
	});

	$eventsSlider.bxSlider({
		auto         : true,
		autoStart    : true,
		pause        : 6000,
		pager        : false,
		infiniteLoop : false,
	});

	$eventsCarousel.owlCarousel({
		autoplay        : true,
		autoplayTimeout : 6000,
		callbacks       : true,
		dots            : false,
		items           : 3,
		margin          : 10,
		nav             : false,
		responsive      : {
			0    : { items: 1 },
			768  : { items: 2 },
			992  : { items: 2 },
			1200 : { items: 3 },
		}
	});

	$newsFeedCarousel.owlCarousel({
		autoplay        : true,
		autoplayTimeout : 6000,
		callbacks       : true,
		dots            : false,
		items           : 3,
		margin          : 10,
		nav             : false,
		responsive      : {
			0    : { items: 1 },
			768  : { items: 3 },
			992  : { items: 2 },
			1200 : { items: 3 },
		}
	});

	// leftsidebar height
	var $leftSidebar = $('.left.sidebar');

	function fixLeftSidebarheight () {
		$leftSidebar.css({
			'min-height' : $leftSidebar.parent().outerHeight()
		});
	}

	fixLeftSidebarheight();
	$window.on('load resize', fixLeftSidebarheight);

	/**
	 * bet modal functionality
	 */
	var $betModal = $('#bet-modal'),
		templates    = {
			loading  : _.template($('#pbt-loading').html()),
			betForm  : _.template($('#pbt-bet-form').html()),
			openBets : _.template($('#pbt-open-bets').html()),
		};

	$('a[data-event-id], button[data-event-id]').on('click', function (e) {
		e.preventDefault();

		$betModal
			.attr('data-event-id', $(this).attr('data-event-id'))
			.modal('show');
	});

	$betModal.on('show.bs.modal', function (e) {
		$betModal.find('.modal-content').html(templates.loading());

		$.ajax({
			type    : 'GET',
			url     : '/events/' + $betModal.attr('data-event-id') + '/players',
			success : function (data) {
				window.data = data;
				$betModal.find('.modal-content').html(templates.betForm(data));
			}
		});
	});

	$betModal.on('submit', 'form.place-bet-form', function (e) {
		e.preventDefault();

		var $form = $(this),
			data = {},
			val;

		$form.find('.error-message').hide();

		_.each($form.serializeArray(), function (a) {
			val = a.value.trim();

			if (!val || !val.length) {
				return;
			}

			data[a.name] = a.value.trim();
		});

		if (_.isEmpty(data)) {
			$form.find('.error-message').show().html('Please fill at-least 1 field');
			return;
		}

		$form.find('input.form-control, button[type=submit]').attr('disabled', 'disabled');

		$.ajax({
			url     : '/bets/' + $betModal.attr('data-event-id'),
			method  : 'POST',
			data    : data,

			success : function (data) {
				$('.sidebar-widget.open-bets ul').prepend(templates.openBets(data));
				$('.sidebar-widget.open-bets ul li.total').html('Total Risked: $' + data.risked);
			},

			error : function (jqXHR) {
				$form.find('.error-message').show().html('Can not place bet as ' + jqXHR.responseJSON.error);
				$form.find('input.form-control, button[type=submit]').removeAttr('disabled');
			},
		});
	});

})(jQuery);