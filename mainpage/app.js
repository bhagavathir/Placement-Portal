const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');
const navLogo = document.querySelector('#navbar__logo');

// Display Mobile Menu
const mobileMenu = () => {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);

//show active menu when scrolling
const highlightMenu = () => {
    const elem = document.querySelector('.highlight')
    const homeMenu = document.querySelector('#home-page')
    const aboutMenu = document.querySelector('#about-page')
    const servicesMenu = document.querySelector('#services-page')
    const signupMenu = document.querySelector('#signup-page')

    let scrollPos = window.scrollY
    //to find out pixels of diff parts of the page
    console.log(scrollPos);

    //adds 'highlight' class to my meny items
    if(window.innerWidth > 960 && scrollPos <400){
        homeMenu.classList.add('highlight')
        aboutMenu.classList.remove('highlight')
        return
    }
    else if(window.innerWidth > 960 && scrollPos <1100){
        aboutMenu.classList.add('highlight')
        homeMenu.classList.remove('highlight')
        servicesMenu.classList.remove('highlight')
        return
    }
    else if(window.innerWidth > 960 && scrollPos <1800){
        servicesMenu.classList.add('highlight')
        aboutMenu.classList.remove('highlight')
        signupMenu.classList.remove('highlight')
        return
    }
    else if(window.innerWidth > 960 && scrollPos <2000){
        signupMenu.classList.add('highlight')
        servicesMenu.classList.remove('highlight')
        return
    }

    if((elem && window.innerWidth <960 &&scrollPos<400) || elem){
        elem.classList.remove('highlight')
    }
}

window.addEventListener('scroll',highlightMenu);
window.addEventListener('click',highlightMenu);

//close mobile menu when clicking on a menu item
const hideMobileMenu = () => {
    const menuBars = document.querySelector('.is-active')
    if(window.innerWidth <= 768 && menuBars){
        menu.classList.toggle('is-active')
        menuLinks.classList.remove('active')
    }
}

menuLinks.addEventListener('click',hideMobileMenu);
navLogo.addEventListener('click',hideMobileMenu);