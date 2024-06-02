$(document).ready(function() {
    initializeCurrencyFormatter();
});

function initializeCurrencyFormatter() {
    // Format the price input field on page load
    formatCurrencyDisplay($('#formattedInput'));

    // Jquery Dependency
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrencyDisplay($(this));
        },
        blur: function() {
            formatCurrencyDisplay($(this), "blur");
        }
    });

    function formatNumber(n) {
        // format number 1000000 to 1.234.567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function formatCurrencyDisplay(input, blur) {
        // formats the input value for display purposes only
        if (!input || !input.length) {
            return;
        }

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            $('#unformattedInput').val('');
            return;
        }

        // original length
        var original_len = input_val.length;

        // initialize unformatted_value with input_val if it doesn't contain non-numeric characters
        var unformatted_value = input_val.replace(/[^0-9,-]+/g, "") === input_val ? input_val : input_val.replace(/[^0-9,-]+/g, "");
        $('#unformattedInput').val(unformatted_value);

        // check for decimal
        if (input_val.indexOf(",") >= 0) {
            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(",");
            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);
            // add commas to left side of number
            left_side = formatNumber(left_side);
            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 3);
            // join number by ,
            input_val = "Rp" + left_side + "," + right_side.substring(1);
        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "Rp" + input_val;
        }

        // update display value
        input.val(input_val);
    }
}