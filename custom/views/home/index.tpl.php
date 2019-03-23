<?php
$limit = $PlanetConfig->getMaxDisplay();
$count = 0;

header('Content-type: text/html; charset=UTF-8');
?><!DOCTYPE html>
<html lang="<?=$conf['locale']?>">
<head>
<link href="http://gmpg.org/xfn/11" rel="profile">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<title><?php echo $PlanetConfig->getName(); ?> | <?=_g('Our awesome planet')?></title>
<?php include(dirname(__FILE__).'/head.tpl.php'); ?>
</head>
<body>
<input type="checkbox" class="sidebar-checkbox" id="sidebar-checkbox">
<?php include_once(dirname(__FILE__).'/sidebar.tpl.php'); ?>

<div class="wrap">
<?php include(__DIR__.'/top.tpl.php'); ?>
  <div class="container content">
    <div class="posts">
<?php if (0 == count($items)) : ?>
      <div class="post">
        <h1 class="post-title">
          <?=_g('No article', 'note de trad')?>
        </h1>
        <article>
          <p><?=_g('No news, good news.')?></p>
        </article>
      </div>
<?php else : ?>
<?php foreach ($items as $item): ?>
<?php
$arParsedUrl = parse_url($item->get_feed()->getWebsite());
$host = 'from-' . preg_replace('/[^a-zA-Z0-9]/i', '-', $arParsedUrl['host']);
?>
      <div class="post <?php echo $host; ?>">
        <h1 class="post-title">
          <a href="<?php echo $item->get_permalink(); ?>" title="<?php echo _g('Go to original place')?>">
            <?php echo $item->get_title(); ?>

          </a>
        </h1>
        <div class="post-meta">
          <?php echo ($item->get_author()? $item->get_author()->get_name() : 'Anonymous'); ?>

          |  <?php
          $feed = $item->get_feed();
          echo '<a href="'.$feed->getWebsite().'" class="source">'.$feed->getName().'</a>';
          ?> |
          <?php
          $ago = time() - $item->get_date('U');
          echo '<span id="post'.$item->get_date('U').'" class="post-date">'.$item->get_date('d/m/Y').'</span>';
          ?>

        </div>
        <article>
          <!-- lapor! indentasi ngaco dimulai - laksanakan -->
          <?php echo $item->get_content(); ?>

          <!-- lapor! indentasi ngaco selesai - kembali ke tempat -->
        </article>
      </div>
<?php if (++$count == $limit) { break; } ?>
<?php endforeach; ?>
<?php endif; ?>
    </div>
  </div>
</div>
<?php include(dirname(__FILE__).'/footer.tpl.php'); ?>

</body>
</html>
