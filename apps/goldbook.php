<?php
$manager = new CommentManager($pdo);
$comments = $manager->findLast();
foreach($comments AS $comment)
{
	require('views/comment.phtml');
}
require('views/goldbook.phtml'); 
?>