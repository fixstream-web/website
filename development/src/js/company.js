'use strict';

const validation = require('./_modules/formValidation.js'),
	  genericForm = document.querySelector('#companyForm');

genericForm.addEventListener('submit', (e) =>{
  e.preventDefault();
  validation.default.testFormEmails(e);
});
