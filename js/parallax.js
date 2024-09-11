//add to script section of index.html or link to file to add parallax for top background image

<script type="text/javascript">
  jQuery(document).ready(function(e) {
    "use strict";

    var element = jQuery('.container-fluid.block_one');
    var parallaxStrength = 0.05; // Adjust this value for more or less parallax

    function updateParallax(e) {
      var left, top;
      var elementWidth = element.width();
      var elementHeight = element.height();
      var offset = element.offset();

      if (e && e.pageX !== undefined && e.pageY !== undefined) {
        // Mouse movement
        var mouseX = e.pageX - offset.left;
        var mouseY = e.pageY - offset.top;
        left = (mouseX - elementWidth / 2) * parallaxStrength;
        top = (mouseY - elementHeight / 2) * parallaxStrength;
      } else {
        // Scroll or touch movement
        var scrollLeft = jQuery(window).scrollLeft();
        var scrollTop = jQuery(window).scrollTop();
        left = (scrollLeft - offset.left) * parallaxStrength;
        top = (scrollTop - offset.top) * parallaxStrength;
      }

      element.css({ backgroundPosition: 'center ' + (-top) + 'px' });
    }

    function handleScroll() {
      updateParallax();
    }

    function handleMouseMove(e) {
      updateParallax(e);
    }

    function handleTouchMove(e) {
      // Adjust this for touch events if needed
      updateParallax(e.originalEvent.touches[0]);
    }

    // Initial setup to center background
    element.css({ backgroundPosition: 'center center' });

    // Bind events
    jQuery(window).bind('scroll', handleScroll);
    element.bind('mousemove', handleMouseMove);
    element.bind('touchmove', handleTouchMove); // Handle touch move for mobile devices

    // Bind to orientation change for mobile devices
    window.addEventListener('orientationchange', function() {
      updateParallax();
    });

    // Initial update
    updateParallax();
  });
</script>