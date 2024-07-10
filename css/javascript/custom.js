let a = document.getElementsByName("gender");

$(document).ready(function () {

    // Validate First Name
    $("#firstName").keyup(function () {
        validateName($("#firstName"), $("#usercheck"));
    });
    $("#Submit").click(function () {
        validateName($("#firstName"), $("#usercheck"));
    })

    // Validate Last Name
    $("#lastName").keyup(function () {
        validateName($("#lastName"), $("#usercheck2"));
    });
    $("#Submit").click(function () {
        validateName($("#lastName"), $("#usercheck2"));
    })

    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter a name");
        } else if (nameValue.length < 3 || nameValue.length > 10) {
            errorElement.show().html("*Name must be between 3 and 10 characters");
        } else {
            errorElement.hide();
        }
    }
});

//Validate email

$(document).ready(function () {
    $("#email").keyup(function () {
        mailValidation($(this).val());
    });
    $("#Submit").click(function () {
        mailValidation($("#email").val());
    });
});

function mailValidation(val) {
    var expr = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    if (!expr.test(val)) {
        if (val === "") {
            $('#errEmail').text('Please enter an email.');
        } else if (!val.includes('@')) {
            $('#errEmail').text('Please include an "@" symbol in the email.');
        } else if (!val.includes('.')) {
            $('#errEmail').text('Please include a "." symbol in the email.');
        } else {
            $('#errEmail').text('Please enter a valid email format.');
        }
        $('#errEmail').show();
    } else {
        $('#errEmail').hide();
    }
}

//validate password
$(document).ready(function () {
    $("#psswd").keyup(function () {
        validPassword($(this).val());
    });
    $("#Submit").click(function () {
        validPassword($("#psswd").val());
    });
});

function validPassword(val) {
    var expr = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    if (!expr.test(val)) {
        $('#errpswd').html('Password must be required with the following format:<br>' +
            '(?=^.{6,}$) - String is > 5 chars,<br>' +
            '(?=.*[0-9]) - Contains a digit,<br>' +
            '(?=.*[A-Z]) - Contains an uppercase letter,<br>' +
            '(?=.*[a-z]) - Contains a lowercase letter,<br>' +
            '(?=.*[^A-Za-z0-9]) - A character not being alphanumeric.'
        ).show();
    } else {
        $('#errpswd').hide();
    }
}

//validate grnder
$(document).ready(function () {
    $('input[type="radio"][name="gender"]').click(function () {
        $('#errgender').hide();
    });

    $("#Submit").click(function () {
        let valid = true;
        // Validate Gender
        if ($('input[type="radio"][name="gender"]:checked').length === 0) {
            $('#errgender').text('Please select a gender.').show();
            valid = false;
        } else {
            $('#errgender').hide();
        }

        return valid;
    });
});

//validate department

$(document).ready(function () {
    let department = $('#department');

    function validateDepartment() {
        if (department.val() === "") {
            $('#errselect').html("Please select a department");
        }
    }

    $('#Submit').click(function () {
        validateDepartment();
    });

    department.focus(function () {
        $('#errselect').hide();
    });
});


//validate Address

$(document).ready(function () {
    $("#add1").keyup(function () {
        validateName($("#add1"), $("#Address"));
    });
    $("#Submit").click(function () {
        validateName($("#add1"), $("#Address"));
    })
    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter Your Address");
        }
        else {
            errorElement.hide()
        }
    }
});
//validate city
$(document).ready(function () {
    $("#City").keyup(function () {
        validateName($("#City"), $("#errcity"));
    });
    $("#Submit").click(function () {
        validateName($("#City"), $("#errcity"));
    })
    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter Your City");
        } else {
            errorElement.hide();
        }
    }
});

//validate state
$(document).ready(function () {
    $("#State").keyup(function () {
        validateName($("#State"), $("#errstate"));
    });
    $("#Submit").click(function () {
        validateName($("#State"), $("#errstate"));
    })
    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter Your state");
        } else {
            errorElement.hide();
        }
    }
});

//validate the country
$(document).ready(function () {
    $("#Country").keyup(function () {
        validateName($("#Country"), $("#errcountry"));
    });
    $("#Submit").click(function () {
        validateName($("#Country"), $("#errcountry"));
    })
    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter Your country");
        } else {
            errorElement.hide();
        }
    }
});

//validate the postal code
$(document).ready(function () {
    $("#zip").keyup(function () {
        validateName($("#zip"), $("#errzipcode"));
    });
    $("#Submit").click(function () {
        validateName($("#zip"), $("#errzipcode"));
    })
    function validateName(nameField, errorElement) {
        let nameValue = nameField.val();
        if (nameValue.length == "") {
            errorElement.show().html("*Please enter Your Postalcode");
        } else {
            errorElement.hide();
        }
    }
});

//validate mobile number
$(document).ready(function () {
    $("#number").keyup(function () {
        number_check($(this).val());
    });
    $("#Submit").click(function () {
        number_check($("#number").val());
    });
});

function number_check(val) {
    var expr = /^\d{10}$/;
    if (!expr.test(val)) {
        $('#errnum').text('Please enter a valid number.').show();
    } else {
        $('#errnum').hide();
    }
}


//validate image profile
$(document).ready(function () {
    $("#fileName").change(function (event) {
        validateImage($(this).val(), ['jpg', 'jpeg', 'png'], $('#errimg'));
    });

    $("#Submit").click(function () {
        let valid = true;
        // Validate Profile Image
        valid = valid && validateImage($("#fileName").val(), ['jpg', 'jpeg', 'png'], $('#errimg'));
        return valid;
    });
});

function validateImage(val, allowedExtensions, errorElement) {
    if (!val) {
        errorElement.html('Please select your profile picture.').show();
        return false;
    }

    var fileName = val;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    if (allowedExtensions.indexOf(extFile) < 0) {
        errorElement.html("Only jpg/jpeg and png files are allowed!").show();
        return false;
    } else {
        errorElement.hide();
        return true;
    }
}
//validate image profile


//end validation

//validate pdf docx

$(document).ready(function () {
    $("#myFile2").change(function (event) {
        var fileName = $(this).val();
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile == "pdf" || extFile == "docx") {
            $("#errresume").hide();
            // TO DO
        } else {
            $("#errresume").html("Only pdf and Docx files are allowed!").show();
            event.preventDefault();
        }
    });
});

$(document).ready(function () {
    $("#Submit").click(function () {
        let valid = true;
        // Validate Resume File
        valid = valid && validateFile($("#myFile2").val(), ['pdf', 'docx'], $('#errresume'));
        return valid;
    });


    function validateFile(val, allowedExtensions, errorElement) {
        if (!val) {
            errorElement.html('Please select your resume.').show();
            return false;
        }

    }

});

$(document).ready(function () {
    $("#Submit").click(function () {
        if (validateForm()) {  // Assuming validateForm is a function that checks all validations
            $("#validate").Submit();
        }
    });
});


