'use strict';

import isEmail from 'validator/lib/isEmail';

const isValidEmail = (email, input) => {
  if (!isEmail(email)) {
    // console.log('Not a valid email');
    inputError('invalid', input);
    return false;
  } else {
  	const badDomains = ['gmail', 'yahoo', 'aol'];
  	const pattern = new RegExp('@(' + badDomains.join('|') + ')\\W.');
    if (pattern.test(email)) {
    	// console.log('Valid email but contains illegal domain');
    	inputError('bad-domain', input);
    	return false;
    } else {
    	return true;
    }
  }
};


const testFormEmails = (e) => {
  const emailInputs = e.target.querySelectorAll('[type="email"]');
  emailInputs.forEach( (input) => {
    if (!isValidEmail(input.value, input)) {
      input.classList.add('invalid');
      input.addEventListener('keyup', handleResolve);
      if (input.previousElementSibling && input.previousElementSibling.nodeName === 'LABEL') {
        input.previousElementSibling.classList.add('invalid');
      }
    }
  });
};

const handleResolve = (e) => {
  const input = e.target;
  if (isValidEmail(input.value, input)) {
  	input.classList.remove('invalid');
  	if (input.nextSibling.classList.contains('error-message')) {
  		input.nextSibling.remove();
  	}
  	if (input.previousElementSibling && input.previousElementSibling.nodeName === 'LABEL') {
      input.previousElementSibling.classList.remove('invalid');
    }
    input.removeEventListener('keyup', handleResolve);
  }
};

const inputError = (type, input) => {
  let errorNode = document.createElement('span');
  let message;
  errorNode.classList.add('error-message');
  switch(type) {
  case 'bad-domain':
    message = 'Please use a business email.';
    break;
  case 'invalid':
    message = 'Enter a valid email address.';
    break;
  default:
    message = 'Unknown error.';
  }
  if (!input.nextElementSibling.classList.contains('error-message')) {
  	errorNode.innerText = message;
    input.parentNode.insertBefore(errorNode, input.nextSibling);
  } else {
  	input.nextElementSibling.innerText = message;
  }
  
};

export default {
  isValidEmail: isValidEmail,
  testFormEmails: testFormEmails
};