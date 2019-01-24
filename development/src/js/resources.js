'use strict';

const validation = require('./_modules/formValidation.js'),
	  resourcesForm = document.querySelector('#resourcesForm');

resourcesForm.addEventListener('submit', (e) =>{
  e.preventDefault();
  validation.default.handleRequiredFields(e);
});
