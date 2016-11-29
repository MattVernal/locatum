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

    //function to check if phone number is at least 7 digits long format is valid by matching regex
    //function isPhone (input){
    //    return input.match(/^\d{7}$/)
    //}


}

function showTramperDates(theForm) {
    var packageBoxList = theForm.elements['package']; //Create node list for package radio buttons
    var flightPackage = ""; // Create empty string for package method
    var tramperOptions = theForm.querySelector('#tramper_options'); //Create variable for the div containing the additional options for trampers
    for (var j = 0; j < packageBoxList.length; j++) { // loop through the node list packageBoxList
        packageBoxList[j].addEventListener('click', function () { // Add a click listener to each radio button that triggers the below function
            for (var i = 0; i < packageBoxList.length; i++) { // loop through radio buttons again
                if (packageBoxList[i].checked) { //If iterated button is checked
                    flightPackage = packageBoxList[i].value; //flightPackage is set to selected value
                }
            }
            if (flightPackage === "1000") { //if the chosen package is tramper then remove the hide class from the tramperOptions div
                tramperOptions.classList.remove('hide');
                
                
            } 
            else {
                tramperOptions.classList.add('hide'); //If it isnt tramper hide it again
                
            }
        })
    }
}

function calculatePrice(theForm) {
    //initalise variables
    var numberOfPeople = 0;
    var price = 0;
    var hours = 0;
    var outputSpan = document.querySelector('#price_output');
    var elements = theForm.elements;
    var totalPrice = 0;

    for (var i = 0; i < elements.length; i++) { // Loop through each element
        elements[i].addEventListener('click', function (evt) { // add event onblur event listener to each field as they are looped through
            for (var i = 0; i < elements.length; i++) { //loop through elements array
                if (elements[i].name === 'duration' && elements[i].checked) { //Get value for duration
                    hours = elements[i].value;
                }
                if (elements[i].name === 'package' && elements[i].checked) {// get value for package
                    price = elements[i].value;
                }
                if (elements[i].name === "numberOfPeople") {//get value for number of people
                    numberOfPeople = elements[i].value;
                }
                totalPrice = price * hours * numberOfPeople;//calcualte total price
                outputSpan.innerHTML = ("Total Price $" + totalPrice);//output price to span
            }        
    })
}
}

function galleryController() {
    //************************************initialise variables************************************
    var mainImage = document.querySelector('#main__img'); // create variable for for hero image
    var thumbnails = document.querySelectorAll('.img_thumbnail'); // create array of thumbnail images
    var lastBorder = document.querySelector(".thumbnail__container img"); // Set element for last border applied
    var leftArrow = document.querySelector(".left-btn"); //Left arrow element
    var rightArrow = document.querySelector(".right-btn"); //right arrow element

    //********************Functions***************************************************************


    function addListeners() { //Functions for adding event listeners for required elements
        for (var i = 0; i < thumbnails.length; i++) { // Loop through thumbnails and add click listeners that trigger the selectMainImage and applyBorder functions
            thumbnails[i].addEventListener('click', changeImageOnCLick);// Add event listener to looped variable to call changeImageOnClick
            thumbnails[i].addEventListener('click', applyBorder);// Add event listener to looped variable to call applyBorder
        }
        leftArrow.addEventListener('click', switchImagePrevious);// Add event listener to the left arrow to call switchImagePrevious
        rightArrow.addEventListener('click', switchImageNext);// Add event listener to the left arrow to call switchImagePrevious
    }

    function changeImageOnCLick(evt) {
        mainImage.src = evt.target.src.replace('300_200', '900_600'); // Change 300_200 in the image src with 900_600
        //Remove border from last selected.
        lastBorder.classList.remove("border");
        //Add border to clicked image
        evt.target.classList.toggle("border");
        //Set last selected to the clicked image.
        lastBorder = evt.target;
        var topLeft = lastBorder.offsetLeft; //Scroll selected image to center
        document.querySelector('.thumbnail__container').scrollLeft = topLeft - 300; //Scroll selected image to center
    }

    //If 'next' button clicked, switch to the next thumbnail by instigating a click  (triggering the onclick event listener for changing image)
    function switchImageNext() {
        if (!lastBorder.nextElementSibling) {
            document.querySelector(".thumbnail__container").firstElementChild.click();
        } else {
            lastBorder.nextElementSibling.click();
        }

    }
    //If 'previous' button clicked, switch to the next thumbnail by instigating a click  (triggering the onclick event listener for changing image)
    function switchImagePrevious(){
        if (!lastBorder.previousElementSibling) {
            document.querySelector(".thumbnail__container").lastElementChild.click();
        } else {
            lastBorder.previousElementSibling.click();
        }

    }
    //apply a border to the new selected image and remove the old one
    function applyBorder(evt) {
        lastBorder.classList.remove("border");
        evt.target.classList.add("border");
        lastBorder = evt.target;
    }

    //**********************Main Script****************************************************************
    lastBorder.classList.add('border');
    addListeners();
}

function showNav() {
    var nav = document.querySelector('.hamburger_menu');
    nav.classList.toggle('hide');
}