// Stableford calculator
var stablefordCalculator = (function () {
    var handicap = 0;

    function init() {
        if ($('.stableford-calculator').length) {
            setHandicap();
            $('input.hole-strokes').change(function() {
                calculateHole($(this));
            });

            $('input.handicap').change(function () {
                calculateHoles();
            });

            $('#course-select').change(function() {
                location.href = $(this).val();
            });

            calculateTotals();
        }
    }

    function setHandicap(){
        handicap = Number($('input.handicap').val());
    }

    function calculateHoles(){
        setHandicap();
        $('input.hole-strokes').each(function(i, hole) {
            calculateHole($(hole));
        });
    }

    function calculateHole(hole) {
        var strokes = hole.val();

        if (strokes !== '') {
            var holeNumber = hole.data('number');
            var par = hole.data('par');
            var stokeIndex = hole.data('si');

            var points = calculatePoints(strokes, par, stokeIndex, handicap);

            $(".hole-strokes[data-number='" + holeNumber + "']").val(strokes);
            $(".hole-points[data-number='" + holeNumber + "']").val(points);
        }
        calculateTotals();
    }

    function strokeAllowance(stokeIndex, handicap) {
        var allowance = 0;
        if (handicap > 18) {
            allowance++;
            handicap -= 18;
        }

        if (stokeIndex <= handicap) {
            allowance++;
        }

        return allowance;
    }

    function calculatePoints(strokes, par, stokeIndex, handicap) {
        var allowance = strokeAllowance(stokeIndex, handicap);
        allowance += par;

        console.log('Strokes:' + strokes);
        console.log('Par:' + par);
        console.log('StrokeIndex:' + stokeIndex);
        console.log('Handicap:' + handicap);
        console.log('StrokeAllowance:' + allowance);

        var points = 0;
        switch (strokes - allowance) {
            case 1: // Bogey - 1 point
                points = 1;
                break;
            case 0: // Par - 2 points
                points = 2;
                break;
            case -1: // Birdie - 3 points
                points = 3;
                break;
            case -2: // Eagle - 4 points
                points = 4;
                break;
            case -3: // Albatross - 5 points
                points = 5;
                break;
            case -4: // Ridiculous - 6 points
                points = 6;
                break;
            case -5: // Impossible - 7 points
                points = 7;
                break;
            case -6: // Nope - 8 points
                points = 8;
                break;
        }

        console.log('Points:' + points);
        console.log('------------');

        return points;
    }

    function calculateTotals(){
        var outStrokes = 0,
            inStrokes = 0,
            totalStrokes = 0,
            outPoints = 0,
            inPoints = 0,
            totalPoints = 0;

            $('input.hole-strokes.calc').each(function(i, hole) {
                var strokes = Number($(hole).val());
                var holeNumber = $(hole).data('number');

                if (strokes !== 0) {
                    switch (true) {
                        case holeNumber <= 9:
                            outStrokes = outStrokes + strokes;
                            break;
                        case holeNumber > 9:
                            inStrokes = inStrokes + strokes;
                            break;
                    }

                    totalStrokes = totalStrokes + strokes;
                }
            });

            $('input.hole-points.calc').each(function(i, hole) {
                var points = Number($(hole).val());
                var holeNumber = $(hole).data('number');

                if (points !== 0) {
                    switch (true) {
                        case holeNumber <= 9:
                            outPoints = outPoints + points;
                            break;
                        case holeNumber > 9:
                            inPoints = inPoints + points;
                            break;
                    }

                    totalPoints = totalPoints + points;
                }
            });

            $('input.out-strokes').val(outStrokes);
            $('input.in-strokes').val(inStrokes);
            $('input.total-strokes').val(totalStrokes);
            $('input.out-points').val(outPoints);
            $('input.in-points').val(inPoints);
            $('input.total-points').val(totalPoints);
    }

    return {
        init: init,
        setHandicap : setHandicap(),
        calculateHole : calculateHole,
        calculateHoles : calculateHoles,
        strokeAllowance : strokeAllowance,
        calculatePoints : calculatePoints,
        calculateTotals : calculateTotals
    };
}());