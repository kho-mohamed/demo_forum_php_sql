<?php
function base_controller_index()
{
    require_once(MODEL_DIR . "/forum.php");
    $forum = forum_select();
    render('forum/index.php', $forum);
}
?>