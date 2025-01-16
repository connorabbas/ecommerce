document.addEventListener("DOMContentLoaded", function () {
    var lastScrollTop = 0;
    var mainContent = document.getElementById("main-content");
    var headerNav = document.getElementById("header-nav");
    var headerInfoBanner = document.getElementById("header-info-banner");
    var headerNavHeight = headerNav.offsetHeight;
    var headerInfoBannerHeight = headerInfoBanner.offsetHeight;
    var checkOffsetHeight = headerNavHeight + headerInfoBannerHeight;

    function adjustContentPadding(add) {
        var currentPadding = mainContent.style.paddingTop;
        var newPadding = add ? `${headerNavHeight}px` : "0px";
        if (currentPadding !== newPadding) {
            mainContent.style.paddingTop = newPadding;
        }
    }

    function updateDimensions() {
        headerNavHeight = headerNav.offsetHeight;
        headerInfoBannerHeight = headerInfoBanner.offsetHeight;
        checkOffsetHeight = headerNavHeight + headerInfoBannerHeight;
    }

    function handleScroll() {
        var currentScroll =
            window.scrollY || document.documentElement.scrollTop;
        var scrollingDown = currentScroll > lastScrollTop;
        if (scrollingDown) {
            if (currentScroll > headerInfoBannerHeight) {
                headerNav.classList.add("scroll-sticky");
                adjustContentPadding(true);
            }
            if (currentScroll > checkOffsetHeight + 200) {
                headerNav.classList.add("hidden");
            }
        } else {
            headerNav.classList.remove("hidden");
            if (currentScroll >= headerInfoBannerHeight) {
                headerNav.classList.add("scroll-sticky");
                adjustContentPadding(true);
            } else {
                headerNav.classList.remove("scroll-sticky");
                adjustContentPadding(false);
            }
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Update lastScrollTop
    }

    window.addEventListener(
        "scroll",
        function () {
            requestAnimationFrame(handleScroll);
        },
        false
    );

    window.addEventListener("resize", function () {
        updateDimensions();
        adjustContentPadding(headerNav.classList.contains("scroll-sticky"));
    });
});
