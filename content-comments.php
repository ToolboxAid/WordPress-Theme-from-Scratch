<?php

if (comments_open() ){
    comments_template();
} else {
    echo '<h5>Comments closed</h5>';
}