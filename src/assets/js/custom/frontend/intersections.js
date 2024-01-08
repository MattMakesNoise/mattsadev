const appearOnScroll = new IntersectionObserver((entries) => {
	entries.forEach(entry => {
		if(entry.isIntersecting) {
			entry.target.classList.add('show');
			appearOnScroll.unobserve(entry.target);
		} else {
			entry.target.classList.remove('show');
		}
	});
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach(hiddenElement => {
	appearOnScroll.observe(hiddenElement);
});
