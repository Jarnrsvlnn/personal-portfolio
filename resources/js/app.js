import './bootstrap';

// ANIMATION
const elements = document.querySelectorAll(".animate-on-scroll");

// EMAIL DIALOG
const openDialog = document.querySelector("#open-dialog");
const emailDialog = document.querySelector("dialog");
const closeDialog = document.querySelector("dialog button");

// NAV BAR ANIMATION
const items = document.querySelectorAll(".nav-item");
const indicator = document.getElementById("indicator");

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('opacity-100')
        }
        else {
            entry.target.classList.remove('opacity-100')
        }
    })
});

elements.forEach(item => observer.observe(item));

openDialog.addEventListener('click', () => {
    emailDialog.showModal();
});

closeDialog.addEventListener('click', () => {
    emailDialog.close();
}); 
    
items.forEach(item => {
    item.addEventListener('click', () => {
        const { offsetLeft, offsetWidth} = item;
        const indicatorWidth = indicator.offsetWidth;

        indicator.style.left = offsetLeft + (offsetWidth / 2) - (indicatorWidth / 2) + 'px';

        items.forEach(i => {
            const span = i.querySelector('span');
            span.classList.remove('active');
        });

        const span = item.querySelector("span");
        span.classList.add('active');
    });
});

