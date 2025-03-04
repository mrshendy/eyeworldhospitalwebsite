$(document).ready(function(){
    var owl = $(".owl-slider");
    var thumbnailsContainer = $(".owl-thumbnails");
    if (owl.length) {

        owl.owlCarousel({
            items: 1,
            loop: false,
            dots: true,
            rtl:true,
            nav: true,
            navText: ["<span class='owl-prev'>&#10094;</span>", "<span class='owl-next'>&#10095;</span>"], // Custom nav buttons
            dotsContainer: '.owl-thumbnails', // Custom dots container
            animateOut: "fadeOut", // Enable fade-out effect
            animateIn: "fadeIn",   // Enable fade-in effect
            smartSpeed: 500, // Adjust speed for smooth transition
          
            onInitialized: function(event) {
                generateThumbnails(event);
            },
            onTranslate: function(event) {
                updateActiveThumbnail(event);
                animateThumbnails();
            }
        });
        var totalItems = $(".owl-slider .item").length;

        owl.on("changed.owl.carousel", function (event) {
            var currentIndex = event.item.index - event.relatedTarget._clones.length / 2 + 1;

            if (currentIndex < 1) {
                currentIndex = totalItems;
            } else if (currentIndex > totalItems) {
                currentIndex = 1;
            }

            // تحديث النص مع إضافة الصفر المسبق للأرقام أقل من 10
            $(".owl-numbers").text(
                totalItems.toString().padStart(2, "0") + "-" + currentIndex.toString().padStart(2, "0")
            );
        });
    }

    if ($('.success-stories-carousel').length) {
        $('.success-stories-carousel').owlCarousel({
            items: 1,
            loop: false,
            dots: true,
            rtl:true,
            nav: true,
            navText: ["<i class='fa-solid fa-arrow-right'></i>", "<i class='fa-solid fa-arrow-left'></i>"], // Custom nav buttons
            smartSpeed: 500, // Adjust speed for smooth transition  
        })
    }    

    if ($('.albums-carousel').length) {
        $('.albums-carousel').owlCarousel({
            items: 1,
            loop: false,
            dots: true,
            rtl:true,
            nav: false,
            smartSpeed: 500, // Adjust speed for smooth transition  
        })
    }

    function generateThumbnails() {
        var carouselItems = $(".owl-slider .item");
        thumbnailsContainer.empty(); // Clear existing dots

        carouselItems.each(function(index) {
            var bgImage = $(this).css("background-image").replace(/url\(["']?(.*?)["']?\)/, '$1'); // Extract URL
            var thumb = $("<div>").addClass("owl-dot").html('<img src="' + bgImage + '">');
            thumbnailsContainer.append(thumb);
        });

        $(".owl-dot").eq(0).addClass("active"); // Set first thumbnail active
        rearrangeThumbnails(); // Ensure first thumbnail is at start
    }

    function updateActiveThumbnail(event) {
        var currentIndex = event.item.index - event.relatedTarget._clones.length / 2;
        if (currentIndex < 0) {
            currentIndex = event.item.count - Math.abs(currentIndex);
        } else if (currentIndex >= event.item.count) {
            currentIndex = currentIndex % event.item.count;
        }

        $(".owl-dot").removeClass("active").eq(currentIndex).addClass("active");
        //rearrangeThumbnails(); // Move active thumbnail to first position
        animateThumbnails(); // Animate transition
    }

    function rearrangeThumbnails() {
        var activeThumbnail = $(".owl-dot.active");
        $(".owl-thumbnails").prepend(activeThumbnail); // Move active thumbnail to first position
    }

    function animateThumbnails() {
        thumbnailsContainer.css({
            "transform": "translateX(-300px)",
            "transition": "0.3s ease-in-out"
        });
        setTimeout(() => {
            thumbnailsContainer.css("transform", "translateX(0)");
        }, 300);
    }

// counter section 

  // Function to check if an element is visible in the viewport
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
        return elemBottom >= docViewTop && elemTop <= docViewBottom;
    }

    // Function to animate counters with a counting effect
    function animateCounters() {
        $(".counter-box .number").each(function () {
            var $this = $(this);
            var countTo = $this.text().replace("+", "").replace(",", ""); // Remove symbols

            $({ countNum: 0 }).animate(
                { countNum: countTo },
                {
                    duration: 2000,
                    easing: "swing",
                    step: function () {
                        $this.text(Math.floor(this.countNum) + "+");
                    },
                    complete: function () {
                        $this.text(this.countNum + "+"); // Ensure the final number is correct
                    },
                }
            );
        });
    }

    // Function to trigger animations when section is in view
    function checkScroll() {
    	$('article').each(function(){

	        var $section = $(this);
	        if ($section.hasClass("animated")) return;

	        if (isScrolledIntoView($section)) {
	        	if ($section.hasClass("achievement")) {
		            $section.addClass("animated");

		            // Animate titles and text
		            $(".pre-title").addClass("animate__animated animate__fadeInUp");
		            $(".main-title").addClass("animate__animated animate__fadeInUp delay-1s");
		            $(".main-para").addClass("animate__animated animate__fadeInUp delay-2s");
		            $(".about-image").addClass("animate__animated animate__fadeInLeft delay-2s");

		            // Animate each counter box with a delay effect
		            $(".counter-box").each(function (index) {
		                var delay = index * 300; // Delay each box animation
		                $(this).addClass("animate__animated animate__zoomIn").css("animation-delay", delay + "ms");
		            });   

                    $(".features-list-box").each(function (index) {
                        var delay = index * 300; // Delay each box animation
                        $(this).addClass("animate__animated animate__zoomIn").css("animation-delay", delay + "ms");
                    });
		              // Start counter animation
		            animateCounters();

	        	}else if($section.hasClass("services")){
	        		$section.addClass("animated");
			     	$(".main-title").addClass("animate__animated animate__fadeInUp");

		            // Animate Paragraphs
		            $(".pdl").addClass("animate__animated animate__fadeInLeft delay-1s");
		            $(".pdr").addClass("animate__animated animate__fadeInRight delay-1s");

		            // Animate Subtitle
		            $(".h4").addClass("animate__animated animate__fadeInUp delay-2s");

		            // Animate List Items with delay effect
		            $(".services-list li").each(function (index) {
		                var delay = (index + 1) * 200; // Incremental delay for each item
		                $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
		            });	            
	        	}else if($section.hasClass("discover")){
	        		$section.addClass("animated");
		            $(".discover-box").each(function (index) {
		                var delay = (index + 1) * 200; // Incremental delay for each item
		                $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
		            });
  	        	}else if($section.hasClass("experience")){
	        		$section.addClass("animated");
   		            $(".pre-title").addClass("animate__animated animate__fadeInLeft");
		            $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
		            $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
		            $(".experience-image").addClass("animate__animated animate__fadeInRight delay-2s");
		         	$(".section-btn").each(function (index) {
		                var delay = (index + 1) * 200; // Incremental delay for each item
		                $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
		            }); 	        	

		         }else if($section.hasClass("faq")){
	        		$section.addClass("animated");
   		            $(".pre-title").addClass("animate__animated animate__fadeInLeft");
		            $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
		            $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
		         	$(".qbox").each(function (index) {
		                var delay = (index + 1) * 200; // Incremental delay for each item
		                $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
		            });

		         }else if($section.hasClass("parteners")){
	        		$section.addClass("animated");
   		            $(".pre-title").addClass("animate__animated animate__fadeInLeft");
		            $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
		            $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
		         	$(".parteners img").each(function (index) {
		                var delay = (index + 1) * 200; // Incremental delay for each item
		                $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
		            });        

                 }else if($section.hasClass("specializations-blocks")){
                    $section.addClass("animated");
                    $(".pre-title").addClass("animate__animated animate__fadeInLeft");
                    $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
                    $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
                    $(".specializations-block ").each(function (index) {
                        var delay = (index + 1) * 200; // Incremental delay for each item
                        $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                    });
                }else if($section.hasClass("doctors")){
                    $section.addClass("animated");
                    $(".pre-title").addClass("animate__animated animate__fadeInLeft");
                    $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
                    $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
                    $(".doctor").each(function (index) {
                        var delay = (index + 1) * 200; // Incremental delay for each item
                        $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                    });
                 }else if($section.hasClass("patients-rights")){
                        $section.addClass("animated");
                        $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
                        $(".rights-box").each(function (index) {
                            var delay = (index + 1) * 200; // Incremental delay for each item
                            $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                        });                 
                 }else if($section.hasClass("global-doctors")){
                        $section.addClass("animated");
                        $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
                        $(".global-doctor-box").each(function (index) {
                            var delay = (index + 1) * 200; // Incremental delay for each item
                            $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                        });  

                }else if($section.hasClass("videos-section")){
                        $section.addClass("animated");
                        $(".aside-tab").each(function (index) {
                            var delay = (index + 1) * 200; // Incremental delay for each item
                            $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                        });           

                        $(".video-box").each(function (index) {
                            var delay = (index + 1) * 200; // Incremental delay for each item
                            $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                        });
                        $(".text-box").each(function (index) {
                            var delay = (index + 1) * 200; // Incremental delay for each item
                            $(this).addClass("animate__animated animate__fadeInUp").css("animation-delay", delay + "ms");
                        });

		         }else if($section.hasClass("contact-us")){
	        		$section.addClass("animated");
   		            $(".pre-title").addClass("animate__animated animate__fadeInLeft");
		            $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
		            $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
		            $(".contact-image").addClass("animate__animated animate__fadeInLeft delay-2s");
		            $("form").addClass("animate__animated animate__fadeInRight delay-2s");                 

                }else if($section.hasClass("success-stories")){
                    $section.addClass("animated");
                    $(".pre-title").addClass("animate__animated animate__fadeInLeft");
                    $(".main-title").addClass("animate__animated animate__fadeInLeft delay-1s");
                    $(".main-para").addClass("animate__animated animate__fadeInLeft delay-2s");
                    $(".success-stories-carousel").addClass("animate__animated animate__fadeInUp delay-2s");
	        	}
	        }


    	});

            var $section = $('footer');
            if ($section.hasClass("animated")) return;

            if (isScrolledIntoView($section)) {
               
                $section.addClass("animated");

                // Animate titles and text

                $(".footer-content").addClass("animate__animated animate__fadeInRight delay-2s");
                $(".footer-contact").addClass("animate__animated animate__fadeInLeft delay-2s");

            

            }
    }

    if($('.all-videos-holder').length){
        $('.all-videos-holder:not(.height-auto)').height( $('.aside-tabs').height() )
    }

    // Run check on page load and scroll
    $(window).on("scroll", checkScroll);
    checkScroll(); // Run once on page load


    $('.tabs div').on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
        $($(this).data('class')).addClass('active').siblings().removeClass('active')
    })

    $('.eye').on('click', function() {
        let input = $(this).prev(); // Get the previous input field
        let type = input.attr('type'); // Get the input type

        if (type === 'password') {
            input.attr('type', 'text'); // Change to text
        } else {
            input.attr('type', 'password'); // Change back to password
        }
    });

   // Handle "Next" button click
        $('.next').on('click', function () {
            // Find the currently active step and step content
            const $activeStep = $('.step.active');
            const $activeContent = $('.step-content.active');

            // Find the next step and step content
            const $nextStep = $activeStep.next('.step');
            const $nextContent = $activeContent.next('.step-content');

            // If there is a next step, move to it
            if ($nextStep.length && $nextContent.length) {
                // Remove active class from current step and content
                $activeStep.removeClass('active');
                $activeContent.removeClass('active');

                // Add active class to next step and content
                $nextStep.addClass('active');
                $nextContent.addClass('active');
            }
        });

        // Handle "Prev" button click
        $('.prev').on('click', function () {
            // Find the currently active step and step content
            const $activeStep = $('.step.active');
            const $activeContent = $('.step-content.active');

            // Find the previous step and step content
            const $prevStep = $activeStep.prev('.step');
            const $prevContent = $activeContent.prev('.step-content');

            // If there is a previous step, move to it
            if ($prevStep.length && $prevContent.length) {
                // Remove active class from current step and content
                $activeStep.removeClass('active');
                $activeContent.removeClass('active');

                // Add active class to previous step and content
                $prevStep.addClass('active');
                $prevContent.addClass('active');
            }
        });

        $('.toggle').on('click',function(){
            $(this).addClass('active').siblings().removeClass('active');
            $('.'+$(this).data('value')).show().siblings().hide();
            $(this).closest('.form-control').find('input').val($('.'+$(this).data('value')).text())
        });

        // Mobile 

        $('.bars').on('click',function(){
            $('nav').slideToggle(250)
        });

        function subMenu(){
            $('.has-children >a').click(function(e){
                e.preventDefault();
                $(this).next().slideToggle(250);
            })
        }

        $(window).on('resize',function(){
            if( $(this).width() < 1024 ){
                subMenu();
            }
        });

        if( $(window).width() < 1024 ){
            subMenu();
        }

        $('.image-holder img').click(function(){
            var video = $(this).data('video');
            $('article.video-holder-wrapper').addClass('open').html(`

            <video width="640" height="360" autoplay controls>
                <source src="${video}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            `)
        });

        $('article.video-holder-wrapper').on('click',function(){
            $(this).removeClass('open').html('')
        });

        $('article.video-holder-wrapper video').on('click',function(e){
            e.stopPropagation();
        })
        $('.pay').on('click',function(e){
            e.preventDefault();
            $('.popup').addClass('open')
        });

        $('.popup').on('click',function(e){
           $(this).removeClass('open')
        })
          $('.popup article').on('click',function(e){
           e.stopPropagation()
        })
});
