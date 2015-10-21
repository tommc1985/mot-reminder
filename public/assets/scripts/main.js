var website = (function () {
    var $html = $('html'),
        $body = $('body'),
        viewportSizeOnLoad = '';
// Responsive state management
	var responsiveStates = (function () {
        return {
            init: function () {
                ssm = ssm || {};

                ssm.addStates([
                    {
                        id: 'xs',
                        maxWidth: 767,
                        onEnter: function(){
                            console.log('Enter mobile');
                        },
                        onLeave: function(){
                            console.log('Leave mobile');
                        }
                    },
                    {
                        id: 'sm-above',
                        minWidth: 768
                    },
                    {
                        id: 'sm',
                        minWidth: 768,
                        maxWidth: 991
                    },
                    {
                        id: 'md-below',
                        maxWidth: 991,
                    },
                    {
                        id: 'md',
                        minWidth: 992,
                        maxWidth: 1199
                    },
                    {
                        id: 'lg',
                        minWidth: 1200
                    }]
                ).ready();

                // Viewport size on load as specified above
                if(responsiveStates.is('xs')) {
                    viewportSizeOnLoad = 'xs';
                }
                else
                {
                    if(responsiveStates.is('md-below')) {
                        viewportSizeOnLoad = 'md-below';
                    }
                    else
                    {
                        viewportSizeOnLoad = 'lg';
                    }
                }
                //console.log(viewportSizeOnLoad);

            },

            is: function (state) {
                var states = ssm.getCurrentStates();
                for (var prop in states) {
                    if (states.hasOwnProperty(prop)) {
                        if (states[prop].id === state) {
                            return true;
                        }
                    }
                }
                return false;

            }
        };
    }());


// Cookies
    var cookiePolicy = (function(){
    	var $cookie = $('#cookie');

        function init() {
            var cookie = Cookies.get('HAGS_cookie');

            if(cookie === undefined){
            	$cookie.addClass('active');
                $cookie.on('click','.close', close);
                Cookies.set('HAGS_cookie', 'true', { expires: 60*60*24*365 });
            }
            else{
                close();
            }
        }

        function close() {
            $cookie.remove();
            return false;
        }

        return {
            init: init
        };
	}());


// Form validation, add class of .form-vaildate around the form to validate
	var siteForms = (function () {
		var $forms = $('.form-validate');

		function init() {
			$forms.bootstrapValidator({
				excluded: [':disabled'],
				feedbackIcons: {
				valid: 'icon-ok',
				invalid: 'icon-cancel',
				validating: 'icon-loading'
				}
			});
		}

		return {
			init: function () {
				if ($forms.length) {
					init();
				}
			}
		};
	}());

    // Scroll to element
    var scrollTo = (function () {

        var init = function () {
            $('.scroll-to').click(function(){
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top - 50
                }, 500);
                return false;
            });
        };

        return {
            init : init
        };
    }());


    var nav = (function () {

        var init = function () {
            $.slidebars();
        };

        return {
            init : init
        };
    }());

    var deleteModel = (function () {
        var $forms = $('.delete-model');

        function init() {
            $forms.submit(function(e) {
                if (confirm($(this).data('delete-message'))) {
                    return true;
                }

                return false;
            });
        }

        return {
            init: function () {
                if ($forms.length) {
                    init();
                }
            }
        };
    }());



// Global init function
	return {
		init: function () {
			responsiveStates.init();

			cookiePolicy.init();

			siteForms.init();

            nav.init();

            stablefordCalculator.init();

            scrollTo.init();

            deleteModel.init();

			// SVG fallback
			if (!Modernizr.svg) {
				$('img[src*="svg"]').attr('src', function () {
					return $(this).attr('src').replace('.svg', '.png');
				});
			}

            $('.match-height').matchHeight();

		}

	};

}());

$(document).ready(website.init);
