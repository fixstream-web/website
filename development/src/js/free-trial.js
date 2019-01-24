'use strict';

const validation = require('./_modules/formValidation.js'),
	  freeTrialForm = document.querySelector('#freeTrialForm');

freeTrialForm.addEventListener('submit', (e) =>{
  e.preventDefault();
  validation.default.handleRequiredFields(e);
});
