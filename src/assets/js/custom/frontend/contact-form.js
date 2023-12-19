// const form = document.getElementById('contact-form');
// const inputs = [
// 	{ element: document.getElementById('fname'), name: 'fname' },
// 	{ element: document.getElementById('sname'), name: 'sname' },
// 	{ element: document.getElementById('email'), name: 'email' },
// 	{ element: document.getElementById('subject'), name: 'subject' },
// 	{ element: document.getElementById('message'), name: 'message' }
// ];
// // const popup = document.querySelector('.success-popup');
//
// inputs.forEach(input => {
// 	const { element, name } = input;
// 	element.addEventListener('input', () => validate(input));
// 	// console.log(input);
// });
//
// function setErrorFor(input, message) {
// 	const formControl = input.element.parentElement;
// 	const small = formControl.querySelector('small');
// 	small.innerText = message;
// 	formControl.className = 'form-control error';
// }
//
// function setSuccessFor(input) {
// 	const formControl = input.element.parentElement;
// 	formControl.className = 'form-control success';
// }
//
// function validate(input) {
// 	const { element, validator } = input;
// 	const value = element.value.trim();
//
// 	if (value === "") {
// 		setErrorFor(input, `${input.name.charAt(0).toUpperCase() + input.name.slice(1)} cannot be blank`);
// 		input.isValid = false;
// 	} else if (!validator(value)) {
// 		setErrorFor(input, `${input.name.charAt(0).toUpperCase() + input.name.slice(1)} is not valid`);
// 		input.isValid = false;
// 	} else {
// 		setSuccessFor(input);
// 		input.isValid = true;
// 	}
// }
//
// form.addEventListener('submit', (e) => {
// 	e.preventDefault();
// 	const allInputsValid = inputs.every(input => input.isValid);
//
// 	if (allInputsValid) {
// 		popup.classList.add('congrats');
// 		form.reset();
//
// 		setTimeout(() => {
// 			inputs.forEach(input => {
// 				input.isValid = false;
// 				setSuccessFor(input);
// 			});
// 		}, 100);
//
// 		setTimeout(() => {
// 			popup.classList.remove('congrats');
// 		}, 5000);
// 	}
// });


const form = document.getElementById('contact-form');
const firstName = document.getElementById('fname');
const secondName = document.getElementById('sname');
const email = document.getElementById('email');
const subject = document.getElementById('subject');
const message = document.getElementById('message');
const popup = document.querySelector('.success-popup');

const formContOne = document.querySelector('#fname');
const formContTwo = document.querySelector('#sname');
const formContThree = document.querySelector('#email');
const formContFour = document.querySelector('#subject');
const formContFive = document.querySelector('#message');

let inputOne = false;
let inputTwo = false;
let inputThree = false;
let inputFour = false;
let inputFive = false;

//get the values from the inputs
// let firstNameValue = firstName.value.trim();
// let secondNameValue = secondName.value.trim();
// let emailValue = email.value.trim();
// let subjectValue = subject.value.trim();
// let messageValue = message.value.trim();

firstName.addEventListener('input', validate);
secondName.addEventListener('input', validate);
email.addEventListener('input', validate);
subject.addEventListener('input', validate);
message.addEventListener('input', validate);

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	//add error message inside small tag
	small.innerText = message;
	//add error class
	formControl.className = 'form-control error';
}
function setSuccessFor(input) {
	const formControl = input.parentElement;
	//add error class
	formControl.className = 'form-control success';
}
function isFirstName(fName) {
	return /^[a-zA-Z]{2,16}$/.test(fName);
}
function isSecondName(sName) {
	return /^[a-zA-Z]{2,16}$/.test(sName);
}
function isEmail(email) {
	return /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]{3,32}@[a-zA-Z0-9-]{3,16}\.[a-zA-Z]{2,8}(\.[a-zA-Z]{2,8})?$/.test(email);
}
function isSubject(subj) {
	return /^[a-zA-Z0-9_ ]{2,64}$/.test(subj);
}

function validate(e) {
	let target = e.target;
	//get the values from the inputs
	let firstNameValue = firstName.value.trim();
	let secondNameValue = secondName.value.trim();
	let emailValue = email.value.trim();
	let subjectValue = subject.value.trim();
	let messageValue = message.value.trim();
	if(target.name === "fname" ) {
		if(firstNameValue === "") {
			//show error
			//add error class
			setErrorFor(firstName, 'First Name cannot be blank');
			inputOne = false;
		} else if(!isFirstName(firstNameValue)) {
			setErrorFor(firstName, 'First Name must be between 2 and 16 characters with only letters');
			inputOne = false;
		} else {
			//add success class
			setSuccessFor(firstName);
			inputOne = true;
		}
	}

	if(target.name === "lastname" ) {
		if(secondNameValue === "") {
			//show error
			//add error class
			setErrorFor(secondName, 'Last Name cannot be blank');
			inputTwo = false;
		} else if(!isSecondName(secondNameValue)) {
			setErrorFor(secondName, 'Last Name must be between 2 and 16 characters with only letters');
			inputTwo = false;
		} else {
			//add success class
			setSuccessFor(secondName);
			inputTwo = true;
		}
	}

	if(target.name === "email" ) {
		if(emailValue === "") {
			//show error
			//add error class
			setErrorFor(email, 'Email cannot be blank');
			inputThree = false;
		} else if (!isEmail(emailValue)) {
			setErrorFor(email, 'Email is not valid');
			inputThree = false;
		} else {
			//add success class
			setSuccessFor(email);
			inputThree = true;
		}
	}

	if(target.name === "subject" ) {
		if(subjectValue === "") {
			//show error
			//add error class
			setErrorFor(subject, 'Subject cannot be blank');
			inputFour = false;
		} else if(!isSubject(subjectValue)) {
			setErrorFor(subject, 'Subject can only be between 2 and 64 characters and contain letters and numbers');
			inputFour = false;
		} else {
			//add success class
			setSuccessFor(subject);
			inputFour = true;
		}
	}

	if(target.name === "message" ) {
		if(messageValue === "") {
			//show error
			//add error class
			setErrorFor(message, 'Message cannot be blank');
			inputFive = false;
		} else if(messageValue.length <= 2 || messageValue.length > 500) {
			setErrorFor(message, "Message must be between 2 and 500 characters");
			inputFive = false;
		} else {
			//add success class
			setSuccessFor(message);
			inputFive = true;
		}
	}
}

form.addEventListener('submit', (e) => {
	//get the values from the inputs
	let firstNameValue = firstName.value.trim();
	let lastNameValue = secondName.value.trim();
	let emailValue = email.value.trim();
	let subjectValue = subject.value.trim();
	let textValue = message.value.trim();
	e.preventDefault()
	if (inputOne && inputTwo && inputThree && inputFour && inputFive) {
		popup.classList.add('congrats');
		form.reset();
		setTimeout(() => {
			inputOne = false;
			inputTwo = false;
			inputThree = false;
			inputFour = false;
			inputFive = false;
			//Clear input green borders
			formContOne.parentElement.classList.remove('success');
			formContTwo.parentElement.classList.remove('success');
			formContThree.parentElement.classList.remove('success');
			formContFour.parentElement.classList.remove('success');
			formContFive.parentElement.classList.remove('success');
		}, 100);
		setTimeout(() => {
			popup.classList.remove('congrats');
		}, 5000);
	}
	if(firstNameValue === "") {
		setErrorFor(firstName, 'First Name cannot be blank');
	} else if(inputOne === false && !isFirstName(firstNameValue)) {
		setErrorFor(firstName, 'First Name must be between 2 and 16 characters with only letters');
	}
	if(lastNameValue === "") {
		setErrorFor(secondName, 'Last Name cannot be blank');
	} else if(inputTwo === false && !isLastName(secondNameValue)) {
		setErrorFor(secondName, 'Last Name must be between 2 and 16 characters with only letters');
	}
	if(emailValue === "") {
		setErrorFor(email, 'Email cannot be blank');
	} else if(inputThree === false && !isEmail(emailValue)) {
		setErrorFor(email, 'Email is not valid');
	}
	if(subjectValue === "") {
		setErrorFor(subject, 'Subject cannot be blank');
	} else if(inputFour === false && !isSubject(subjectValue)) {
		setErrorFor(subject, 'Subject can only be between 2 and 64 characters and contain letters and numbers');
	}
	if(textValue === "") {
		setErrorFor(message, 'Message cannot be blank');
	} else if(inputFour === false && messageValue.length <= 2 || messageValue.length > 500) {
		setErrorFor(message, "Message must be between 2 and 500 characters");
	}
});
