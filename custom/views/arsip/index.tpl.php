<?php
$count = 0;
$today = Array();
$week = Array();
$month = Array();
$older = Array();
$now = time();

foreach ($items as $item) {
    $age = ($now - $item->get_date('U')) / (60*60*24);
    if ($age < 1) {
        $today[] = $item;
    } elseif ($age < 7) {
        $week[] = $item;
    } elseif ($age < 30) {
        $month[] = $item;
    } else {
        $older[] = $item;
    }
}


header('Content-type: text/html; charset=UTF-8');
?><!DOCTYPE html>
<html lang="<?=$conf['locale']?>">
<head>
<link href="http://gmpg.org/xfn/11" rel="profile">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<title><?php echo _g('Archives')?> | <?php echo $PlanetConfig->getName(); ?></title>
<?php include(dirname(__FILE__).'/head.tpl.php'); ?>
</head>
<body>
<input type="checkbox" class="sidebar-checkbox" id="sidebar-checkbox">
<?php include_once(dirname(__FILE__).'/sidebar.tpl.php'); ?>
<div class="wrap">
<?php include(__DIR__.'/top.tpl.php'); ?>
  <div class="container content">
    <div class="posts">
<?php if (0 == count($items)) :?>
      <div class="post">
        <h1 class="post-title">
          <?=_g('No article', 'note de trad')?>
        </h1>
        <article>
          <p><?=_g('No news, good news.')?></p>
        </article>
      </div>
<?php endif; ?>
<?php if (count($today)): ?>
      <div class="post">
        <h1 class="post-title"><?=_g('Today')?></h1>
        <article>
          <ul>
          <?php foreach ($today as $item): ?>
          <?php $feed = $item->get_feed(); ?>
            <li>
              <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> :
              <a href="<?php echo $item->get_permalink(); ?>" title="<?=_g('Go to original place')?>"><?php echo $item->get_title(); ?></a>
            </li>
      <?php endforeach; ?>
          </ul>
        </article>
      </div>
<?php endif; ?>
<?php if (count($week)): ?>
      <div class="post">
        <h1 class="post-title"><?=_g('This week')?></h1>
        <article>
          <ul>
<?php foreach ($week as $item): ?>
<?php $feed = $item->get_feed(); ?>
            <li>
              <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> :
              <a href="<?php echo $item->get_permalink(); ?>" title="<?=_g('Go to original place')?>"><?php echo $item->get_title(); ?></a>
            </li>
  <?php endforeach; ?>
          </ul>
        </article>
      </div>
<?php endif; ?>
<?php if (count($month)): ?>
      <div class="post">
        <h1 class="post-title"><?=_g('This month')?></h1>
        <article>
          <ul>
<?php foreach ($month as $item): ?>
<?php $feed = $item->get_feed(); ?>
            <li>
              <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> :
              <a href="<?php echo $item->get_permalink(); ?>" title="<?=_g('Go to original place')?>"><?php echo $item->get_title(); ?></a>
            </li>
  <?php endforeach; ?>
          </ul>
        </article>
      </div>
<?php endif; ?>
<?php if (count($older)): ?>
      <div class="post">
        <h1 class="post-title"><?=_g('Older items')?></h1>
        <article>
          <ul>
<?php foreach ($older as $item): ?>
<?php $feed = $item->get_feed(); ?>
            <li>
              <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> :
              <a href="<?php echo $item->get_permalink(); ?>" title="<?=_g('Go to original place')?>"><?php echo $item->get_title(); ?></a>
            </li>
  <?php endforeach; ?>
          </ul>
        </article>
      </div>
<?php endif; ?>
    </div>
  </div>
</div>
<?php include(dirname(__FILE__).'/footer.tpl.php'); ?>
</body>
</html>
