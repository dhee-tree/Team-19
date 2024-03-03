function getUrlParameter(name) {
    name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


document.addEventListener('DOMContentLoaded', function () {
    // Initialize price range slider
    var priceRangeSlider = document.getElementById('priceRangeSlider');
    var minPriceInput = document.getElementById('minCost');
    var maxPriceInput = document.getElementById('maxCost');

    // Get URL parameters
    var minCostParam = getUrlParameter('minCost');
    var maxCostParam = getUrlParameter('maxCost');

    // Convert parameters to integers
    var minCost = parseInt(minCostParam) || 0;
    var maxCost = parseInt(maxCostParam) || 10000;

    console.log(minCost);
    console.log(maxCost);


    noUiSlider.create(priceRangeSlider, {
        start: [0, 10000], // Initial range
        connect: true, // Connect the handles
        range: {
            'min': 0,
            'max': 10000
        },
        format: {
            to: function (value) {
                return parseInt(value);
            },
            from: function (value) {
                return parseInt(value);
            }
        }
    });

    // Set initial values for input fields
    minPriceInput.value = minCost;
    maxPriceInput.value = maxCost;
    priceRangeSlider.noUiSlider.set([minCost, maxCost]);


    // Update slider when input field values change
    minPriceInput.addEventListener('input', function () {
        var startPosition = this.selectionStart;
        var endPosition = this.selectionEnd;
        priceRangeSlider.noUiSlider.set([this.value, null]);
        this.setSelectionRange(startPosition, endPosition);
    });

    maxPriceInput.addEventListener('input', function () {
        var newMaxValue = parseInt(this.value);
        var currentMinValue = parseInt(minPriceInput.value);

        if (newMaxValue >= currentMinValue) {
            var startPosition = this.selectionStart;
            var endPosition = this.selectionEnd;
            priceRangeSlider.noUiSlider.set([null, newMaxValue]);
            this.setSelectionRange(startPosition, endPosition);
        }
    });

    // Update input fields when slider values change
    priceRangeSlider.noUiSlider.on('update', function (values) {
        minPriceInput.value = values[0];
        maxPriceInput.value = values[1];
    });
});