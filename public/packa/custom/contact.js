hideDefaults()
hideAndShowDiv($('#contact_type').attr('data-value'))

$("#contact_type").change(function(e) {
    e.preventDefault();
    resetDesignationField();
    $.ajax({
        type: "POST",
        url: feedBaseUrl('/api/contact-designations'),
        data: {'contact_type':$(this).val()},
        success: function (data) {
            if(data.status) {
                appendDesignationDatas(data.data);
            }
        }
    });
    loadHud()
    hideAndShowDiv($('option:selected', this).attr('data-value'))
    return false;
});


$("#is_post_vacant").change(function(e) {
    e.preventDefault();
   
    
    hideAndShow($('option:selected', this).attr('data-value'))
    return false;
});


    function resetDesignationField() {
        $("#designation_id").empty();
        $("#designation_id").append('<option value="" >-- Select Designation -- </option>');
    }

    function appendDesignationDatas(data) {
        $.each(data,function(key, value)
        {
            $("#designation_id").append('<option value=' + value.id + '>' + value.name + '</option>');
        });
    }

    function hideDefaults() {
        $("#hud_div").hide();
        $("#block_div").hide();
        $("#phc_div").hide();
        $("#hsc_div").hide();
        

    }

    function hideAndShowDiv(key) {
        hideDefaults()

        if(key == 'hud') {
            $("#hud_div").show();
            $("#block_div").hide();
            $("#phc_div").hide();
            $("#hsc_div").hide();
        }

        if(key == 'block') {
            $("#hud_div").show();
            $("#block_div").show();
            $("#phc_div").hide();
            $("#hsc_div").hide();
        }

        if(key == 'hsc') {
            $("#hud_div").show();
            $("#block_div").show();
            $("#phc_div").show();
            $("#hsc_div").show();
        }

        if(key == 'phc') {
            $("#hud_div").show();
            $("#block_div").show();
            $("#phc_div").show();
            $("#hsc_div").hide();
        }


    }

     function hideAndShow(key) {
        

        if(key == 'no') {
            $("#contact_type_div").show();
            $("#name_div").show();
            $("#designation_div").show();
            $("#is_post_vacant_div").show();
            $("#mobile_number_div").show();
            $("#landline_number_div").show();
            $("#email_id_div").show();
            $("#fax_div").show();
            $("#status_div").show();
        }

        if(key == 'yes') {
            $("#contact_type_div").show();
            $("#name_div").hide();
            $("#designation_div").show();
            $("#is_post_vacant_div").show();
            $("#mobile_number_div").hide();
            $("#landline_number_div").hide();
            $("#email_id_div").hide();
            $("#fax_div").hide();
            $("#status_div").show();
            
        }

        
    }

function loadHud() {
    if($('#contact_type > option:selected').attr('data-value') == 'hud' || $('#contact_type > option:selected').attr('data-value') == 'block' || $('#contact_type > option:selected').attr('data-value') == 'phc' || $('#contact_type > option:selected').attr('data-value') == 'hsc') {
        resetHUDField();
        $.ajax({
            type: "POST",
            url: feedBaseUrl('/api/list-hud'),
            data: {'hud_id':$("#hidden_hud_id").val()},
            success: function (data) {
                if(data.status) {
                    appendHUDDatas(data.data);
                }
            }
        });
        return false;
    }
}

function resetHUDField() {
    $("#hud_id").empty();
    $("#hud_id").append('<option value="" >-- Select HUD -- </option>');
}

function appendHUDDatas(data) {
    var hidden_hud_id = $("#hidden_hud_id").val()
    var selected = ''
    $.each(data,function(key, value)
    {
        selected = ''
        if (hidden_hud_id == value.id) {
            selected = 'selected'
        }
        $("#hud_id").append('<option value=' + value.id + ' '+selected+'>' + value.name + '</option>');
    });
    if(hidden_hud_id) {
        $("#hud_div").hide()
        $("#hud_id").change()
    }
}

$("#hud_id").change(function(e) {
    if($('#contact_type > option:selected').attr('data-value') == 'hud' || !$(this).val()) {
        return;
    }
    e.preventDefault();
    resetBlockField();
    $.ajax({
        type: "POST",
        url: feedBaseUrl('/api/list-block'),
        data: {'hud_id':$(this).val()},
        success: function (data) {
            if(data.status) {
                appendBlockDatas(data.data);
            }
        }
    });
    return false;
});

function resetBlockField() {
    $("#block_id").empty();
    $("#block_id").append('<option value="" >-- Select Block -- </option>');
}

function appendBlockDatas(data) {
    $.each(data,function(key, value)
    {
        $("#block_id").append('<option value=' + value.id + '>' + value.name + '</option>');
    });
}

$("#block_id").change(function(e) {
    if($('#contact_type > option:selected').attr('data-value') == 'block' || !$(this).val()) {
        return;
    }
    e.preventDefault();
    resetPHCField();
    $.ajax({
        type: "POST",
        url: feedBaseUrl('/api/list-phc'),
        data: {'block_id':$(this).val()},
        success: function (data) {
            if(data.status) {
                appendPHCDatas(data.data);
            }
        }
    });
    return false;
});

function resetPHCField() {
    $("#phc_id").empty();
    $("#phc_id").append('<option value="" >-- Select PHC -- </option>');
}

function appendPHCDatas(data) {
    $.each(data,function(key, value)
    {
        $("#phc_id").append('<option value=' + value.id + '>' + value.name + '</option>');
    });
}


$("#phc_id").change(function(e) {
    var data_value = $('#contact_type > option:selected').attr('data-value');
    if( data_value == 'block' || data_value == 'phc' || !$(this).val()) {
        return;
    }
    e.preventDefault();
    resetHSCField();
    $.ajax({
        type: "POST",
        url: feedBaseUrl('/api/list-hsc'),
        data: {'phc_id':$(this).val()},
        success: function (data) {
            if(data.status) {
                appendHSCDatas(data.data);
            }
        }
    });
    return false;
});

function resetHSCField() {
    $("#hsc_id").empty();
    $("#hsc_id").append('<option value="" >-- Select HSC -- </option>');
}

function appendHSCDatas(data) {
    $.each(data,function(key, value)
    {
        $("#hsc_id").append('<option value=' + value.id + '>' + value.name + '</option>');
    });
}
