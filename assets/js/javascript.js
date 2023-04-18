/**
 * My JavaScript file
 *
 * Version: 1.0.0
 */

/* animation section */
function handleAnimationEvents() {

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    //return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    return (((compareBottom - 150) <= viewBottom) && (compareTop >= viewTop));
  };

  function callbackFunc(queryList) {    
    for (var i = 0; i < queryList.length; i++) {
      if ($(queryList[i]).visible(true)){
        if (!queryList[i].classList.contains('visible')) {
          var rect = queryList[i].getBoundingClientRect();
          queryList[i].classList.add("visible");
        }
      }
    }
  }

  var navs = document.querySelectorAll('.post-navigation');
  callbackFunc(navs);
  var widgets = document.querySelectorAll('.widget-item');
  callbackFunc(widgets);
  var posts = document.querySelectorAll('.post');
  callbackFunc(posts);
  var info = document.querySelectorAll('.info-box');
  callbackFunc(info);

  var events = ["load", "scroll", "resize"]; // this load does not trigger, i.e. above callbacFunc()
  events.forEach(function(event) {
    window.addEventListener(event, function() {callbackFunc(navs);});
    window.addEventListener(event, function() {callbackFunc(widgets);});
    window.addEventListener(event, function() {callbackFunc(posts);});
    window.addEventListener(event, function() {callbackFunc(info);});
  });
}
window.addEventListener('load', handleAnimationEvents);




/* ========================= */
/* pre.code block formatting */
/* ========================= */
// Create a static variable to keep track of the code block count
let codeCounter = 0;

window.onload = function () {

  // Get all the code blocks on the page
  const codeBlocks = document.querySelectorAll('pre.wp-block-code code');

  // Loop through each code block and duplicate it
  codeBlocks.forEach((block) => {
    const parent = block.parentNode;

    // Create a new button for copying the code block to clipboard
    const copyButton = document.createElement('a');
    copyButton.textContent = 'Copy';
    copyButton.classList.add(`code`); // Add the code-# class to the button
    copyButton.classList.add(`code-${++codeCounter}`); // Add the code-# class to the button

    // Create a new <pre> element with the modified class
    const newBlock = document.createElement('pre');
    newBlock.appendChild(copyButton);

    newBlock.classList.add('wp-modified-code');
    parent.classList.add(`code-${codeCounter}`); // Add the code-# class

    // Create a new <code> element and append the block's content to it
    const newCode = document.createElement('code');

    // Insert line numbers for each line
    const lines = block.textContent.split('\n');
    for (let i = 0; i < lines.length; i++) {
      const lineNumber = document.createElement('span');
      lineNumber.classList.add('line-number');
      lineNumber.textContent = String(i + 1).padStart(3, '0');

      const lineContent = document.createElement('span');
      lineContent.classList.add('line-content');
      lineContent.classList.add('printed-line');
      lineContent.textContent = lines[i];

      const lineWrap = document.createElement('p');
      lineWrap.appendChild(lineNumber);
      lineWrap.appendChild(lineContent);
      lineWrap.classList.add('line-wrap');

      newCode.appendChild(lineWrap);
    }

    // Append the new <code> element to the new <pre> element
    newBlock.appendChild(newCode);

    // Insert the new block after the original block
    parent.insertAdjacentElement('afterend', newBlock);


    // Add event listener to the copy button
    copyButton.addEventListener('click', () => {
      const textToCopy = lines.map(line => line + '\n').join('');
      navigator.clipboard.writeText(textToCopy);
      alert('Upon clicking `OK`, the code block will be copied to clipboard!');
    });
  });

  /* Now hide the original code if javascript is enabled */
  // Select all elements with the class of 'wp-block-code'
  const blockcodes = document.querySelectorAll('.wp-block-code');
  // Loop through each 'wp-block-code' element and add a new class
  for (let i = 0; i < blockcodes.length; i++) {
    blockcodes[i].classList.add('hide-me');
  }

}; // end window.onload


/* ================== */
/* Top Of Page button */
/* ================== */
window.addEventListener('load', function () {
  //$(document).ready(function() {
  const ballContainer = $("#ball-container");

  ballContainer.on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
      ballContainer.fadeIn(1500);
    } else {
      ballContainer.fadeOut(1500);
    }
  });

  $(window).scroll(); // execute scroll() function on page load

});


/* ===================== */
/* Awesome font 4.7 hack */
/* get all elements with */
/* class "fa-fa" and     */
/* replace with fa       */
/* ===================== */
window.addEventListener('load', function () {
const faElements = document.querySelectorAll('.fa-fa');

// loop through each element and replace "fa-fa" with "fa"
faElements.forEach(element => {
  element.classList.remove('fa-fa');
  element.classList.add('fa');
});
});

