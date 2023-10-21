window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");
    $('#status').val(selItem);
    }
    $('#status').change(function() {
        var selVal = $(this).val();
        sessionStorage.setItem("SelItem", selVal);
    });
