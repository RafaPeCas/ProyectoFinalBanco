document.addEventListener("DOMContentLoaded", function () {
    let mobileMenuBtn = document.getElementById("mobile-menu-btn");
    let navList = document.getElementById("nav-list");
    let navbar = document.getElementById("navbar");

    mobileMenuBtn.addEventListener("click", function () {
        navList.style.display = (navList.style.display === "flex") ? "none" : "flex";
    });

    window.addEventListener("resize", function () {
        if (window.innerWidth > 768) {
            navList.style.display = "flex";
        } else {
            navList.style.display = "none";
        }
    });

    let prevScrollPos = window.scrollY;

    window.addEventListener("scroll", function () {
        let currentScrollPos = window.scrollY;

        if (prevScrollPos > currentScrollPos) {
            navbar.classList.remove("navbar-scrolled");
        } else {
            navbar.classList.add("navbar-scrolled");
        }


        prevScrollPos = currentScrollPos;
    });
});
