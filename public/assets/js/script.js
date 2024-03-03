// window inner width calculation
const getWinWidth = document.getElementById("width-indicator");
window.addEventListener("load", calcWidth);
window.addEventListener("resize", calcWidth);

function calcWidth() {
  getWinWidth.innerHTML = window.innerWidth + "px";
}

$(document).ready(function () {
  const siteHeader = $(".site-header");
  const siteHeaderTop = $(".site-header__top")
  const siteHeaderBottom = $(".site-header__bottom")
  
  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
    //   siteHeader.addClass("site-header--shrinked");
        siteHeaderTop.addClass("d-none")
        siteHeaderBottom.addClass("fixed-top bg-light")
    } else {
        siteHeaderTop.removeClass("d-none")
        siteHeaderBottom.removeClass("fixed-top bg-light")
    //   siteHeader.removeClass("site-header--shrinked");
    }

    // Scroll Top fade in out
    if ($(document).scrollTop() > 300) {
      $(".btn--scroll-to-top").addClass("show");
    } else {
      $(".btn--scroll-to-top").removeClass("show");
    }
  });

  $(".btn--scroll-to-top").on("click", function () {
    scrollToTop(0, 500);
  });

  function scrollToTop(offset, duration) {
    $("html, body").animate({ scrollTop: offset }, duration);
    return false;
  }

  // $("html").click(function (event) {
  //   if ($(event.target).closest(".offcanvas, .site-header__btn--nav-toggler, .offcanvas__btn--close").length === 0) {
  //     $(".site-header .offcanvas").removeClass("offcanvas--show");
  //   }
  // });

  // ---> Hero Carousel
  $(".hero-desktop-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 20000, 
    smartSpeed: 1000,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    items : 1, 
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false
  });
  
  $(".hero-mobile-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 20000, 
    smartSpeed: 1000,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    items : 1, 
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false
  });

  $(".hero-desktop-carousel").on("changed.owl.carousel", function (e) {
    if (e.item) {
      var index = e.item.index - 1;
      var count = e.item.count;

      // console.log(count);

      if (index > count) {
        index -= count;
      }
      if (index <= 0) {
        index += count;
      }

      $(".video-wrapper").each(function() {
        if($(this).attr("data-index") == index){
          console.log("matched");
          $(this).find("video").get(0).play();
        }
        else {
          console.log("not matched");
          $(this).find("video").get(0).pause();
        }
      })
    }
  });
  
  $(".hero-mobile-carousel").on("changed.owl.carousel", function (e) {
    if (e.item) {
      var index = e.item.index - 1;
      var count = e.item.count;

      // console.log(count);

      if (index > count) {
        index -= count;
      }
      if (index <= 0) {
        index += count;
      }

      $(".video-wrapper").each(function() {
        if($(this).attr("data-index") == index){
          console.log("matched");
          $(this).find("video").get(0).play();
        }
        else {
          console.log("not matched");
          $(this).find("video").get(0).pause();
        }
      })
    }
  });

  // ---> Partners Carousel
  $(".brands-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 10,
    nav: false,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 2,
        margin: 12,
      },
      576: {
        items: 2,
        margin: 12,
      },
      768: {
        items: 3,
        margin: 16,
      },
      992: {
        items: 3,
        margin: 32,
      },
      1200: {
        items: 4,
        margin: 36,
      },
      1700: {
        items: 5,
        margin: 40,
      },
    },
  });

  // ---> Testimonial Carousel
  $(".testimonial-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoWidth: true,
    items: 6,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 16,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    // responsive: {
    //   0: {
    //     items: 1,
    //     margin: 16,
    //   },
    //   576: {
    //     items: 1,
    //     margin: 20,
    //   },
    //   768: {
    //     items: 1,
    //     margin: 20,
    //   },
    //   992: {
    //     items: 1,
    //     margin: 20,
    //   },
    //   1200: {
    //     items: 1,
    //     margin: 20,
    //   },
    // },
  });

  // ---> Courses Carousel
  $(".courses-carousel").owlCarousel({
    loop: false,
    autoplay: false,
    autoWidth: true,
    items: 6,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 12,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        margin: 12,
      },
      576: {
        margin: 16,
      },
    },
  });

  // ---> Books Carousel
  $(".books-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    items: 2,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 16,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 2,
        margin: 12,
      },
      576: {
        items: 3,
        margin: 16,
      },
      768: {
        items: 3,
        margin: 16,
      },
      992: {
        items: 5,
        margin: 16,
      },
      1200: {
        items: 5,
        margin: 20,
      },
    },
  });

  // ---> Notifications Carousel
  $(".notifications-carousel").owlCarousel({
    loop: false,
    autoplay: true,
    items: 2,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 16,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 1,
        margin: 12,
      },
      576: {
        items: 2,
        margin: 12,
      },
      768: {
        items: 2,
        margin: 12,
      },
      992: {
        items: 3,
        margin: 12,
      },
    },
  });

  // ---> Search Function on Header
  $(".site-header__btn--search").on("click", function () {
    $(".site-header .form-wrapper").addClass("form-wrapper--show");
    $("body").toggleClass("scroll--disabled");
    $(".site-content").toggleClass("pe-none");
  });

  $(".form-wrapper__btn--close").on("click", function () {
    $(".site-header .form-wrapper").removeClass("form-wrapper--show");
    $("body").removeClass("scroll--disabled");
    $(".site-content").removeClass("pe-none");
  });

  // ---> Magnific Popup
  $(".gallery a").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
    mainClass: "mfp-no-margins mfp-with-zoom", // class to remove default margin from left and right side
    image: {
      verticalFit: true,
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
    },
  });

  // --> College Single Tab
  $("#colSingleTab .nav-link").on("click", function (e) {
    scrollToTop(200, 500);
  });

  // --> Drawer Navigation
  $(".site-header .offcanvas .menu-cat-list li > a").on("click", function (e) {
    e.preventDefault();
    $(this).next().addClass("drawer-menu-wrapper--active");
    $(".site-header .offcanvas .btn--back").removeClass("invisible");
  });

  $(".site-header .offcanvas .btn--back").on("click", function () {
    $(".site-header .offcanvas .drawer-menu-wrapper").removeClass("drawer-menu-wrapper--active");
    $(this).addClass("invisible");
  });

  $("#btnSearchTrigger").on("click", function () {
    $(".site-header .form-wrapper").addClass("form-wrapper--show");
    $("body").toggleClass("scroll--disabled");
    $(".site-content").toggleClass("pe-none");

    setTimeout(function () {
      $(".site-header .form-wrapper .search-form input").focus();
    }, 300);
  });

  // ---> Custom tab function
  function tabInit(el) {
    const tButtons = $(el + " " + ".custom-tab__btn");
    const tPanes = $(el + " " + ".custom-tab__content .custom-tab__pane");

    tButtons.on("click", function (e) {
      e.preventDefault();
      tButtons.removeClass("active");
      $(this).addClass("active");

      tPanes.removeClass("active");
      $(el + " " + ".custom-tab__content .custom-tab__pane[data-id=" + "'" + $(this).attr("data-target") + "'" + "]").addClass("active");
    });
  }

  tabInit("#boardExamsCTab");
  tabInit("#topCollegesTab");
  tabInit("#topExamsCTab");
  tabInit("#trendingCoursesCTab");
  tabInit("#exploreProgramsTab");

  // ---> Accourdion
  $(".set > a").on("click", function (e) {
    e.preventDefault();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).siblings(".content").slideUp(200);
      $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
    } else {
      $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
      $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this).siblings(".content").slideDown(200);
    }
  });
});
