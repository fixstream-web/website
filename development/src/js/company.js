/* Default JS*/
const formValidation = require('./_modules/formValidation.js'),
	  genericForm = document.querySelector('#companyForm');

genericForm.addEventListener('submit', (e) =>{
  e.preventDefault();
  console.log(e);
  console.log("Email is valide: " + formValidation.isValidEmail());
});
