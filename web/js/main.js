function addFormValidation(theForm) { // Function to be called on pageload to validate the form
    if (theForm === null || theForm.tagName.toUpperCase() !== 'FORM') { // if a non form element or nothing is passed into the function throw the below error
        throw new Error("expected first parameter to addFormValidation to be a FORM.");
    }
    theForm.noValidate = true; // disable HTML5 validation
    var elements = theForm.elements; // Create an array of all the elements in the form
    for (var i = 0; i < elements.length; i++) { // Loop through each element
        elements[i].addEventListener('blur', function (evt) { // add event onblur event listener to each field as they are looped through
            for (var i = 0; i < elements.length; i++) { //loop through all elements in array
                isFieldValid(evt.target); // if isFieldValid function does not return an error is error === true and rest of script can run through
            }
        });
    }


    theForm.addEventListener('submit', function (evt) { // add event listener
        var isError = false; // set error value to false initially
        for (var i = 0; i < elements.length; i += 1) { //loop through all elements in array
            if (!isFieldValid(elements[i])) { // if isFieldValid function does not return an error is error === true and rest of script can run through
                isError = true;
            }
        }
        if (isError) { //If the function returns an error prevent submission
            evt.preventDefault();
        }
    });

    //*****************************Function to check fields validity as they are looped through by the addFormValidation function******************
    function isFieldValid(field) { //function for checking validity of field
        var errorMessage = ""; //initialise error message, blank to start

        if (!needsToBeValidated(field)) { // if the field does not need validation return true
            return true;
        }

        if (field.id.length === 0 && field.name.length === 0) { // check for valid ids on all fields, throw an error if not
            console.error("error: ", field);
            throw new Error("found a field that is missing an id and/or name attribute. name should be there. id is required for determining the field's error message element.");
        }

        field.classList.remove('invalid'); // remove the class invalid

        var errorSpan = document.querySelector('#' + field.id + '-error'); // set the field where any error style classes need to be applied


        errorSpan.classList.remove('danger'); //Remove the danger class
        errorSpan.innerHTML = ""; //Set error message to an empty string
        if (field.minLength > 0 && field.value.length < field.minLength) { // check input is over a certain length (defined in the HTML)
            errorMessage = "Must be " + field.minLength + " or more characters long.";
        }
        if (field.type === "email" && !isEmail(field.value)) { //check email field input is a valid email address
            errorMessage = "This should be a valid email address.";
        }
        if (field.className === "date" && !isDate(field.value)) { //check date field input is a valid date
            errorMessage = "This should be a date in the format DD/MM/YYYY.";
        }
        if (field.className === "time" && !isTime(field.value)) { //check time field input is a valid time
            errorMessage = "This should be a time in the format HH:MM.";
        }
        if (field.id === "phone" && isNaN(field.value)) {
            errorMessage = "This should be a phone number in the format XXXXXX (7 digits minimum, no spaces";
        }
        if (field.id === "hourlyRate" && isNaN(field.value)) {
            errorMessage = "This should be a number";
        }
        if (field.required && field.value.trim() === "") { // Check for empty fields
            errorMessage = "This field is required.";
        }

        if (errorMessage !== "") { // if error message isnt an empty string add the style classes invalid and danger and add the error message to the innerHTML
            field.classList.add('invalid');

            errorSpan.classList.add('danger');
            errorSpan.innerHTML = errorMessage;
            return false;
        }

        return true;
    }

    //Function  to check if field needs to be validated, return true/ false
    function needsToBeValidated(field) {
        if (field.offsetHeight === 0 && field.offsetWidth === 0) { // Checked if field is hidden, if it is hidden it doesn't need to be validated
            return false;
        }
        return ['submit', 'reset', 'button', 'hidden', 'fieldset', 'checkbox', 'radio'].indexOf(field.type) === -1;
    }

    //Function to check if email format is valid by matching regex
    function isEmail(input) {
        return input.match(/^([a-z0-9_.\-+]+)@([\da-z.\-]+)\.([a-z\.]{2,})$/);
    }

    //Function to check date format is valid by matching regex
    function isDate(input) {
        return input.match(/\d\d\/\d\d\/\d\d\d\d/);
    }

    //function to check if time format is valid by matching regex
    function isTime(input) {
        return input.match(/^\d{1,2}:\d{2}([ap]m)?$/)
    }

//    function to check if phone number is at least 7 digits long format is valid by matching regex
//    function isPhone (input){
//        return input.match(/^\d{7}$/)
//    }


}

function showClinicOptions(theForm) {
    var accountBoxList = theForm.elements['accountType']; //Create node list for package radio buttons
    var chosenAccountType = ""; // Create empty string for package method
    var clinicOptions = theForm.querySelector('#clinicOptions'); //Create variable for the div containing the additional options for trampers
    for (var j = 0; j < accountBoxList.length; j++) { // loop through the node list packageBoxList
        accountBoxList[j].addEventListener('click', function () { // Add a click listener to each radio button that triggers the below function
            for (var i = 0; i < accountBoxList.length; i++) { // loop through radio buttons again
                if (accountBoxList[i].checked) { //If iterated button is checked
                    chosenAccountType = accountBoxList[i].value; //flightPackage is set to selected value
                }
            }
            if (chosenAccountType === "clinic") { //if the chosen package is tramper then remove the hide class from the tramperOptions div
                clinicOptions.classList.remove('hide');


            } else {
                clinicOptions.classList.add('hide'); //If it isnt tramper hide it again
            }
        });
    }
}