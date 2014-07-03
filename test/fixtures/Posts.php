<?php

$today = new DateTime;

return array(
  array(
    'post_title' => 'something',
    'post_date' => $today,
    'post_date_gmt' => $today,
    'post_modified' => $today,
    'post_modified_gmt' => $today,
    'guid' => sha1(1)
  ),
  array(
    'post_title' => 'something two',
    'post_date' => $today,
    'post_date_gmt' => $today,
    'post_modified' => $today,
    'post_modified_gmt' => $today,
    'guid' => sha1(2)
  )
);

?>
