// Select all slides
const slides = document.querySelectorAll(".slide");

// Loop through slides and set each translateX to index * 100%
slides.forEach((slide, index) => {
	slide.style.transform = `translateX(${index * 100}%)`;
});

// select next slide button
const nextSlide = document.querySelector(".btn-next");

// current slide counter
let curSlide = 0;
// max no of slides
let maxSlide = slide.length - 1;

// add event listener and next slide functionality
nextSlide.addEventListener("click", function () {
	// Check current slide is last, if so reset
	if (curSlide === maxSlide) {
		curSlide = 0;
	} else {
		curSlide++;
	}

	slides.forEach((slide, index) => {
		slide.style.transform = `translateX(${100 * (index - curSlide)}%)`;
	});
});

// select prev slide button
const prevSlide = document.querySelector(".btn-prev");

// add event listener and navigation functionality
prevSlide.addEventListener("click", function () {
	// check if current slide is the first and reset current slide to last
	if (curSlide === 0) {
		curSlide = maxSlide;
	} else {
		curSlide--;
	}

	//   move slide by 100%
	slides.forEach((slide, index) => {
		slide.style.transform = `translateX(${100 * (index - curSlide)}%)`;
	});
});
