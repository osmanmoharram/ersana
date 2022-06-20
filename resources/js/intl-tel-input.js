import intlTelInput from "intl-tel-input";

const input = document.querySelector("#phone");
intlTelInput(input, {
    utilsScript: 'utils.js',
    allowDropdown: true,
    
    // any initialisation options go here
});

