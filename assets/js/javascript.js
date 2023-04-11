/**
 * My JavaScript file
 *
 * Version: 1.0.0
 */

/* animation section */
window.addEventListener('load', function () {

  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      //rect.top > 0 && rect.top + 300 <= this.scrollY + window.innerHeight
      rect.top + 1 <= this.scrollY + window.innerHeight  // what is the correct math here
    );
  }

  function callbackFunc(queryList) {    
    for (var i = 0; i < queryList.length; i++) {

// if (!queryList[i].classList.contains('visible')) {      
// // //const element = document.querySelector('.widget-item');
// // const elementRect = element.getBoundingClientRect();
// // Get the height of the viewport
// const windowHeight = window.innerHeight;
// // Check if any part of the element is visible
// if (queryList[i].bottom >= 0 && queryList[i].top <= windowHeight) {
//   console.log('Element is partially or fully visible on the page');
// } else {
//   console.log('Element is not visible on the page');
// }
// }

      if (isElementInViewport(queryList[i])) {
        if (!queryList[i].classList.contains('visible')) {
          var rect = queryList[i].getBoundingClientRect();
          //console.log(this.scrollY,"<scroll YOff>", window.pageYOffset, rect.top, "<top -rect- bottom>", rect.bottom, " iHt>", window.innerHeight);      
          queryList[i].classList.add("visible");
        }
      }
    }
  }

  var widgets = document.querySelectorAll('.widget-item');
  callbackFunc(widgets);
  window.addEventListener("load", function () { callbackFunc(widgets); });
  window.addEventListener("scroll", function () { callbackFunc(widgets); });
  window.addEventListener("resize", function () { callbackFunc(widgets); });

  var posts = document.querySelectorAll('.post');
  callbackFunc(posts);
  window.addEventListener("load", function () { callbackFunc(posts); });
  window.addEventListener("scroll", function () { callbackFunc(posts); });
  window.addEventListener("resize", function () { callbackFunc(posts); });

  var info = document.querySelectorAll('.info-box');
  callbackFunc(info);
  window.addEventListener("load", function () { callbackFunc(info); });
  window.addEventListener("scroll", function () { callbackFunc(info); });
  window.addEventListener("resize", function () { callbackFunc(info); });

});


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
    copyButton.textContent = 'Copy to Clipboard';
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

