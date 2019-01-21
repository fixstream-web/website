'use strict';

import isEmail from 'validator/lib/isEmail';

const isValidEmail = (email) => {
  if (!isEmail(email)) {
    console.log('Not a valid email');
    return false;
  } else {
  	const badDomains = ['gmail', 'yahoo', 'aol'];
  	const pattern = new RegExp('\@(' + badDomains.join('|') + ')\W.');
    if (pattern.test(email)) {
    	console.log('Valid email but contains illegal domain');
    	return false;
    } else {
    	return true;
    }
  }
};


const testFormEmails = (e) => {
  const emailInputs = e.target.querySelectorAll('[type="email"]');
  emailInputs.forEach( (input) => {
    if (!isValidEmail(input.value)) {
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
  if (isValidEmail(input.value)) {
  	input.classList.remove('invalid');
  	if (input.previousElementSibling && input.previousElementSibling.nodeName === 'LABEL') {
      input.previousElementSibling.classList.remove('invalid');
    }
    input.removeEventListener('keyup', handleResolve);
  }
};

export default {
  isValidEmail: isValidEmail,
  testFormEmails: testFormEmails
};