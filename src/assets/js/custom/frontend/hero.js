const buttons = document.querySelectorAll("[data-carousel-button]");
const dots = document.querySelectorAll("[data-carousel-dot]");
const slides = document.querySelector("[data-slides]");

buttons.forEach(button => {
	button.addEventListener("click", (e) => {
		const activeSlide = slides.querySelector("[data-active]");
		const offset = button.dataset.carouselButton === "next" ? 1 : -1;

		let newIndex = [...slides.children].indexOf(activeSlide) + offset;

		if (newIndex < 0) newIndex = slides.children.length -1;
		if (newIndex >= slides.children.length) newIndex = 0;

		slides.children[newIndex].dataset.active = true;
		delete activeSlide.dataset.active;
	});
});

dots.forEach((dot, index) => {
	dot.addEventListener("click", () => {
		const newIndex = parseInt(dot.dataset.carouselDot) - 1;
		const activeSlide = slides.querySelector("[data-active]");

		slides.children[newIndex].dataset.active = true;
		delete activeSlide.dataset.active;

		dots.forEach((dot, index) => {
			dot.classList.toggle("active", index === newIndex);
		});
	});
});
