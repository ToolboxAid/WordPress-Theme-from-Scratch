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


/* */
/* */
/* */
// pre.code block formatting

// Create a static variable to keep track of the code block count
let codeCounter = 0;

window.onload = function() {

  // Get all the code blocks on the page
  const codeBlocks = document.querySelectorAll('pre.wp-block-code code');

  // Loop through each code block and duplicate it
  codeBlocks.forEach((block) => {
    const parent = block.parentNode;

    // Create a new <pre> element with the modified class
    const newBlock = document.createElement('pre');
    newBlock.classList.add('wp-modified-code');
    parent.classList.add(`code-${++codeCounter}`); // Add the code-# class

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

    // Create a new button for copying the code block to clipboard
    const copyButton = document.createElement('a');
    copyButton.textContent = 'Copy to Clipboard';
    copyButton.classList.add(`code-${codeCounter}`); // Add the code-# class to the button
    newBlock.appendChild(copyButton);

    // Add event listener to the copy button
    copyButton.addEventListener('click', () => {
      const textToCopy = lines.map(line => line + '\n').join('');
      navigator.clipboard.writeText(textToCopy);
      alert('Code block copied to clipboard!');
    });
  });


  /* Now hide the original*/
  // Select all elements with the class of 'widget'
  const widgets = document.querySelectorAll('.wp-block-code');
  // Loop through each 'widget' element and add a new class
  for (let i = 0; i < widgets.length; i++) {
    widgets[i].classList.add('hide-me');
  }

};

