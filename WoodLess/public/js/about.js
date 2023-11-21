document.addEventListener('DOMContentLoaded', function standard () {
    //define variables
    var aboutButton = document.getElementById('about');
    var faqButton = document.getElementById('faq');
    var ourCommitmentsButton = document.getElementById('ourcommitments');
    var meetTeamButton = document.getElementById('meetteam');
    var aboutText = document.getElementById('aboutustext');
    var faqText = document.getElementById('FAQtext');
    var ourCommitmentsText = document.getElementById('ourcommitmentstext');
    var meetTheTeamText = document.getElementById('meettheteamtext');
    // default show about us
    faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
// when about us clicked show aboutus text hide rest 
    aboutButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'block';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
    })
    // when FAQ clicked  show relevant text  hide rest 
    faqButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'block';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'none';
    })
    // when  commitment  clicked  show relevant text  hide rest 
    ourCommitmentsButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'block';
        meetTheTeamText.style.display = 'none';
    })
     // when meet team  clicked  show relevant text  hide rest 
    meetTeamButton.addEventListener('click', function showaboutus () {
        aboutText.style.display = 'none';
        faqText.style.display = 'none';
        ourCommitmentsText.style.display = 'none';
        meetTheTeamText.style.display = 'block';
    })
})
/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});
