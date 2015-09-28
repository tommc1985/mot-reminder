var admin = (function () {
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

// Form validation, add class of .form-vaildate around the form to validate
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

// Scorecard calculator
var scorecardCalculations = (function () {

    function init() {
        if ($('.scorecard-calculator').length) {
            calculateTotals();

            $('input.hole-yardage').change(function() {
                setYardage($(this));
            });

            $('input.hole-par').change(function() {
                setPar($(this));
            });

            $('input.hole-stroke-index').change(function() {
                setStrokeIndex($(this));
            });
        }
    }

    function setYardage(hole) {
        var yards = hole.val();
        var holeNumber = hole.data('number');

        $(".hole-yardage[data-number='" + holeNumber + "']").val(yards);

        calculateTotals();
    }

    function setPar(hole) {
        var par = hole.val();
        var holeNumber = hole.data('number');

        $(".hole-par[data-number='" + holeNumber + "']").val(par);

        calculateTotals();
    }

    function setStrokeIndex(hole) {
        var strokeIndex = hole.val();
        var holeNumber = hole.data('number');

        $(".hole-stroke-index[data-number='" + holeNumber + "']").val(strokeIndex);
    }

    function calculateTotals(){
        var outYardage = 0,
            inYardage = 0,
            totalYardage = 0,
            outPar = 0,
            inPar = 0,
            totalPar = 0;

            $('input.hole-yardage.calc').each(function(i, hole) {
                var yardage = Number($(hole).val());
                var holeNumber = $(hole).data('number');

                if (yardage !== 0) {
                    switch (true) {
                        case holeNumber <= 9:
                            outYardage = outYardage + yardage;
                            break;
                        case holeNumber > 9:
                            inYardage = inYardage + yardage;
                            break;
                    }

                    totalYardage = totalYardage + yardage;
                }
            });

            $('input.hole-par.calc').each(function(i, hole) {
                var par = Number($(hole).val());
                var holeNumber = $(hole).data('number');

                if (par !== 0) {
                    switch (true) {
                        case holeNumber <= 9:
                            outPar = outPar + par;
                            break;
                        case holeNumber > 9:
                            inPar = inPar + par;
                            break;
                    }

                    totalPar = totalPar + par;
                }
            });

            $('input.out-yardage').val(outYardage);
            $('input.in-yardage').val(inYardage);
            $('input.total-yardage').val(totalYardage);
            $('input.out-par').val(outPar);
            $('input.in-par').val(inPar);
            $('input.total-par').val(totalPar);
    }

    return {
        init: init,
        setYardage : setYardage,
        setPar : setPar,
        setStrokeIndex : setStrokeIndex,
        calculateTotals : calculateTotals
    };
}());



    // Player Scorecard calculator
    var playerScorecardCalculator = (function () {

        function init() {
            if ($('.stableford-calculator').length) {

                $('input.hole-nearest-to-pin').change(function() {
                    setNearestToPin($(this));
                });

                $('input.hole-longest-drive').change(function() {
                    setLongestDrive($(this));
                });

                $('input.hole-fir').change(function() {
                    setFir($(this));
                });

                $('input.hole-gir').change(function() {
                    setGir($(this));
                });

                $('input.hole-sand').change(function() {
                    setSand($(this));
                });

                $('input.hole-penalties').change(function() {
                    setPenalties($(this));
                });

                $('input.hole-putts').change(function() {
                    setPutts($(this));
                });
            }
        }

        function setNearestToPin(hole) {
            var checked = hole.is(':checked');
            var holeNumber = hole.data('number');


            $(".hole-nearest-to-pin[data-number='" + holeNumber + "']").prop('checked', checked);
        }

        function setLongestDrive(hole) {
            var checked = hole.is(':checked');
            var holeNumber = hole.data('number');


            $(".hole-longest-drive[data-number='" + holeNumber + "']").prop('checked', checked);
        }

        function setFir(hole) {
            var checked = hole.is(':checked');
            var holeNumber = hole.data('number');


            $(".hole-fir[data-number='" + holeNumber + "']").prop('checked', checked);
        }

        function setGir(hole) {
            var checked = hole.is(':checked');
            var holeNumber = hole.data('number');


            $(".hole-gir[data-number='" + holeNumber + "']").prop('checked', checked);
        }

        function setSand(hole) {
            var checked = hole.is(':checked');
            var holeNumber = hole.data('number');


            $(".hole-sand[data-number='" + holeNumber + "']").prop('checked', checked);
        }

        function setPenalties(hole) {
            var penalties = hole.val();
            var holeNumber = hole.data('number');


            $(".hole-penalties[data-number='" + holeNumber + "']").val(penalties);
        }

        function setPutts(hole) {
            var putts = hole.val();
            var holeNumber = hole.data('number');


            $(".hole-putts[data-number='" + holeNumber + "']").val(putts);
        }

        return {
            init: init,
            setNearestToPin : setNearestToPin,
            setLongestDrive : setLongestDrive,
            setFir : setFir,
            setGir : setGir,
            setSand : setSand,
            setPenalties : setPenalties,
            setPutts : setPutts,
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



// Global init function
	return {
		init: function () {
			responsiveStates.init();

			deleteModel.init();

			scorecardCalculations.init();
            playerScorecardCalculator.init();

            stablefordCalculator.init();

            nav.init();

			// SVG fallback
			if (!Modernizr.svg) {
				$('img[src*="svg"]').attr('src', function () {
					return $(this).attr('src').replace('.svg', '.png');
				});
			}

		}

	};

}());

$(document).ready(admin.init);
