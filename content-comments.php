
<div class="comments-block">
<hr><?php
if (comments_open() ){
    comments_template();
} else {
    echo '<h5>Comments are closed.</h5>';
}
?>
</div>

