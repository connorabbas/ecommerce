// Hide/Show 'scrollToTop' button
function scrollFunction() {
    // Check if the page is scrolled more than 20 pixels
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        document.getElementById("scrollToTop").style.display = "block";
    } else {
        document.getElementById("scrollToTop").style.display = "none";
    }
}

// Attach the scroll event listener to the window
window.onscroll = function () {
    scrollFunction();
};

// Get the 'scrollToTop' button and attach a click event listener
document.getElementById("scrollToTop").addEventListener("click", function () {
    // Scroll to the top of the document
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
