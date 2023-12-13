document.addEventListener("DOMContentLoaded", function () {
    let header = document.querySelector("header");
    let mobileMenuBtn = document.getElementById("mobile-menu-btn");
    let navList = document.getElementById("nav-list");
    let navbar = document.getElementById("navbar");
    let logo = document.getElementById("logo");

    function checkHeaderClass() {

        if (header.classList.contains('headerSinBanner')) {
            handleScrolledNavbar();
        } else {
            window.addEventListener("resize", handleResize);

            window.addEventListener("scroll", handleScroll);
        }
    }

    function toggleMobileMenu() {
        navList.style.display = (navList.style.display === "flex") ? "none" : "flex";
    }

    function handleScroll() {
        let currentScrollPos = window.scrollY;

        if (prevScrollPos > currentScrollPos) {
            navbar.classList.remove("navbar-scrolled");
            logo.style.display = "none";
        } else {
            navbar.classList.add("navbar-scrolled");
            logo.style.display = "block";
        }

        prevScrollPos = currentScrollPos;
    }

    function handleScrolledNavbar() {
        navbar.classList.add("navbar-scrolled");
        logo.style.display = "block";
    }

    function handleResize() {
        if (window.innerWidth > 768) {
            navList.style.display = "flex";
        } else {
            navList.style.display = "none";
        }
    }
    mobileMenuBtn.addEventListener("click", toggleMobileMenu);
    let prevScrollPos = window.scrollY;
    checkHeaderClass();
});
