
$(document).ready(function() {
    var hoddie_perc = parseFloat($('#hoodie').val()*0.1).toFixed(2);
    var sweater_perc = parseFloat($('#sweater').val()*0.1).toFixed(2);
    var jacket_perc = parseFloat($('#jacket').val()*0.1).toFixed(2);
    var jumper_perc = parseFloat($('#jumper').val()*0.1).toFixed(2);
    var blazer_perc = parseFloat($('#blazer').val()*0.1).toFixed(2);
    var raincoat_perc = parseFloat($('#raincoat').val()*0.1).toFixed(2);
    Morris.Donut({
        element: 'morris-donut-graph',
        data: [
            {label: "hoodie", value: hoddie_perc},
            {label: "sweater", value: sweater_perc},
            {label: "jacket", value: jacket_perc},
            {label: "jumper", value: jumper_perc},
            {label: "blazer", value: blazer_perc},
            {label: "raincoat", value: raincoat_perc}
        ]
    });
});