'use strict';

import isEmail from 'validator/lib/isEmail';

const isValidEmail = (email, input) => {
  if (!isEmail(email)) {
    // console.log('Not a valid email');
    handleInputError('invalid', input);
    return false;
  } else {
  	const badDomains = ['gmail', 'yahoo', 'aol'];
  	const pattern = new RegExp('@(' + badDomains.join('|') + ')\\W.');
    if (pattern.test(email)) {
    	// console.log('Valid email but contains illegal domain');
    	handleInputError('bad-domain', input);
    	return false;
    } else {
    	return true;
    }
  }
};
const isValidPhone = (number, input) => {
  const pattern = new RegExp('^(\\+?\\d{1,2}\\s?)?\\(?\\d{3}\\)?[\\s.-]?\\d{3}[\\s.-]?\\d{4}$');
  if (!pattern.test(number)) {
    // console.log('Invalid phone format');
    handleInputError('bad-phone', input);
    return false;
  } else {
    return true;
  }
};

const hasValue = (input) => {
  if (input.value === '') { return false; } else { return true; }
};

const handleRequiredFields = (e) => {
  const allRequired = e.target.querySelectorAll('[required]');
  allRequired.forEach((input) => {
    if (!hasValue(input)) {
      // console.log(input.attributes.name.value + ' is empty');
      handleInputError('required', input);
    } else if (input.attributes.type.value == 'email') {
      isValidEmail(input.value, input);
    } else if (input.attributes.type.value == 'tel') {
      isValidPhone(input.value, input);
    }
  });
};

const handleResolve = (e) => {
  const input = e.target;
  const type = e.target.attributes.type.value;
  switch(type) {
  case 'text':
    if (!hasValue(input)) { return; }
    break;
  case 'email':
    if (!isValidEmail(input.value, input)) { return; }
    break;
  case 'tel':
    if (!isValidPhone(input.value, input)) { return; }
    break;
  default:
    console.log('Unknown input type');
  }

  input.classList.remove('invalid');
  if (input.nextSibling.classList.contains('error-message')) {
    input.nextSibling.remove();
  }
  if (input.previousElementSibling && input.previousElementSibling.nodeName === 'LABEL') {
    input.previousElementSibling.classList.remove('invalid');
  }
  input.removeEventListener('keyup', handleResolve);

};

const handleInputError = (type, input) => {
  let errorNode = document.createElement('span');
  let message;
  errorNode.classList.add('error-message');
  switch(type) {
  case 'bad-domain':
    message = 'Please use a business email.';
    break;
  case 'bad-phone':
    message = 'Please enter a valid phone number with area code.';
    break;
  case 'invalid':
    message = 'Please enter a valid email address.';
    break;
  case 'required':
    message = 'This is a required field.';
    break;
  default:
    message = 'Unknown error.';
  }
  input.classList.add('invalid');
  input.addEventListener('keyup', handleResolve);
  if (input.previousElementSibling && input.previousElementSibling.nodeName === 'LABEL') {
    input.previousElementSibling.classList.add('invalid');
  }
  if (!input.nextElementSibling.classList.contains('error-message')) {
  	errorNode.innerText = message;
    input.parentNode.insertBefore(errorNode, input.nextSibling);
  } else {
  	input.nextElementSibling.innerText = message;
  }
};


const listenToForms = () => {
  const forms = document.querySelectorAll('form');
  forms.forEach((form) => {
    form.addEventListener('submit', (e) =>{
      e.preventDefault();
      handleRequiredFields(e);
    });
  });
};

export default {
  isValidEmail: isValidEmail,
  isValidPhone: isValidPhone,
  handleRequiredFields: handleRequiredFields,
  listenToForms: listenToForms
};