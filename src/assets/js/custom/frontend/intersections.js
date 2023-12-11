const fadeIn = document.querySelectorAll('.fade-in');
const slideIn = document.querySelectorAll('.slide-in');

const appearOnScrollOptions = {
	root: null, //it is the viewport
	threshold: 0,
	rootMargin: "-100px"
};

const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
	entries.forEach(entry => {
		if(entry.isIntersecting) {
			entry.target.classList.add('appear');
			appearOnScroll.unobserve(entry.target);
		}
	})
}, appearOnScrollOptions);

fadeIn.forEach(fadeIn => {
	appearOnScroll.observe(fadeIn);
});

slideIn.forEach(slideIn => {
	appearOnScroll.observe(slideIn);
});
