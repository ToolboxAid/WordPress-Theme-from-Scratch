/**
 * My JavaScript file
 *
 * Version: 1.0.0
 */

window.addEventListener('load', function() {
  //console.log("hello my friends");
  function isElementInViewport(el) {
      var rect = el.getBoundingClientRect();

      //console.log(el.getBoundingClientRect().top," ",el.getBoundingClientRect().left);    
      return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom - 250 <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
  }

  var items = document.querySelectorAll('.widget-item');

  function callbackFunc() {
      for (var i = 0; i < items.length; i++) {
          if (isElementInViewport(items[i])) {
              items[i].classList.add("visible");
          }
      }
  }

  callbackFunc();
  window.addEventListener("load", callbackFunc);
  window.addEventListener("scroll", callbackFunc);
  window.addEventListener("resize", callbackFunc);

  function widgetFunc() {
    var widgets = document.querySelectorAll('.widget-item');
    //console.log("Number of widgets: " + widgets.length);
    for (var i = 0; i < widgets.length; i++) {
      var rect = widgets[i].getBoundingClientRect();
      //console.log("Widget-top: " + rect.top + ", left: " + rect.left);
    }
  }
  widgetFunc();
});
