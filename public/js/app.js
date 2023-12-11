document.addEventListener("DOMContentLoaded", function () {
    let mobileMenuBtn = document.getElementById("mobile-menu-btn");
    let navList = document.getElementById("nav-list");

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
});
