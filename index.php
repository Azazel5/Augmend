<!DOCTYPE html>
<?php include('parallax_header.php'); ?>
<?php include('database_connection.php') ?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>AugMEND</title>

  <!-- All the stylesheets and CDN's to bootstrap, fontawesome, and jQuery -->

  <link rel="stylesheet" href="css/page_one.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- JS files for the page, jQuery, the model viewer -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/jquery.singlePageNav.min.js"></script>
  <script src="https://cdn.babylonjs.com/viewer/babylon.viewer.js"></script>
</head>

<body>

  <!-- Navbar section -->
  <section id="hero" class="text-white tm-font-big tm-parallax">

    <section id="introduction" class="tm-section-pad-top">

      <div id="home_text" class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
          <h2 class="tm-hero-title">AugMEND</h2>
          <p class="tm-hero-subtitle">
            AugMEND your life.
            <br />
          </p>
        </div>
      </div>
    </section>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="tm-section-pad-top tm-parallax-2">

    <div class="box">
      <a href="model_index.php" class="btn btn-white btn-animation-1">Get Started</a>
    </div>

    <footer class="text-center small tm-footer">
      <p class="mb-0">
        Copyright &copy; UpadTechnologies
      </p>
    </footer>

  </section>

  <!-- This script calculates the screen height dynamically to give a parallax effect -->
  <script>
    function getOffSet() {
      var _offset = 450;
      var windowHeight = window.innerHeight;

      if (windowHeight > 500) {
        _offset = 400;
      }
      if (windowHeight > 680) {
        _offset = 300
      }
      if (windowHeight > 830) {
        _offset = 210;
      }

      return _offset;
    }

    function setParallaxPosition($doc, multiplier, $object) {
      var offset = getOffSet();
      var from_top = $doc.scrollTop(),
        bg_css = 'center ' + (multiplier * from_top - offset) + 'px';
      $object.css({
        "background-position": bg_css
      });
    }

     
    var background_image_parallax = function($object, multiplier, forceSet) {
      multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
      multiplier = 1 - multiplier;
      var $doc = $(document);

      if (forceSet) {
        setParallaxPosition($doc, multiplier, $object);
      } else {
        $(window).scroll(function() {
          setParallaxPosition($doc, multiplier, $object);
        });
      }
    };

    var background_image_parallax_2 = function($object, multiplier) {
      multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
      multiplier = 1 - multiplier;
      var $doc = $(document);
      $object.css({
        "background-attachment": "fixed"
      });
      $(window).scroll(function() {
        var firstTop = $object.offset().top,
          pos = $(window).scrollTop(),
          yPos = Math.round((multiplier * (firstTop - pos)) - 186);

        var bg_css = 'center ' + yPos + 'px';

        $object.css({
          "background-position": bg_css
        });
      });
    };

    $(function() {
      // Navbar Section - Background Parallax
      background_image_parallax($(".tm-parallax"), 0.30, false);
      background_image_parallax_2($("#contact"), 0.80);

      // Handle window resize
      window.addEventListener('resize', function() {
        background_image_parallax($(".tm-parallax"), 0.30, true);
      }, true);

      // Detect window scroll and update navbar
      $(window).scroll(function(e) {
        if ($(document).scrollTop() > 120) {
          $('.tm-navbar').addClass("scroll");
        } else {
          $('.tm-navbar').removeClass("scroll");
        }
      });

      // Close mobile menu after click 
      $('#tmNav a').on('click', function() {
        $('.navbar-collapse').removeClass('show');
      })

      // Scroll to corresponding section with animation
      $('#tmNav').singlePageNav();

      // Add smooth scrolling to all links
      // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 400, function() {
            window.location.hash = hash;
          });
        } // End if
      });

      // Pop up
      $('.tm-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
          enabled: true
        }
      });

      // Gallery
      $('.tm-gallery').slick({
        dots: true,
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 2,
        responsive: [{
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
  </script>
</body>

</html>