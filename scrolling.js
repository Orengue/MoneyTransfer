
  const sections = document.querySelectorAll('section');
  const options = {
    threshold: 0.5
  };

  // Create an observer that will trigger a function when a section is 50% visible
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      } else {
        entry.target.classList.remove('visible');
      }
    });
  }, options);

  // Add the observer to each section
  sections.forEach(section => {
    observer.observe(section);
  });
