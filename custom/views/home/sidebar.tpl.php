<?php
$all_people = $Planet->getPeople();
usort($all_people, array('PlanetFeed', 'compare'));
?><div class="sidebar" id="sidebar">
  <div class="sidebar-item">
    <div class="sidebar-personal-info">
      <div class="sidebar-personal-info-section">
        <a href="<?php echo $PlanetConfig->getUrl(); ?>">
          <img src="https://cdn.jsdelivr.net/gh/arachvy/lnx@master/custom/img/logo.svg" title="<?php echo $PlanetConfig->getName(); ?>" alt="logo" />
        </a>
      </div>
    </div>
  </div>
  <nav class="sidebar-nav">
    <span class="">
      <a class="sidebar-nav-item active" href="?type=home">
        <?php echo _g('Home')?>

      </a>
    </span>
    <span class="">
      <a class="sidebar-nav-item " href="?type=arsip" title="<?=_g('See all headlines')?>">
        <?php echo _g('Archives')?>

      </a>
    </span>
    <span class="foldable">
      <a class="sidebar-nav-item" href="custom/people.opml" title="<?=_g('All feeds in OPML format')?>">
        <?php echo _g('People') . ' (OPML) <span class="badge badge-light">' . count($all_people) . '</span>'?>
      </a>
<?php foreach ($all_people as $person) : ?>
      <a class="sidebar-nav-item sidebar-nav-item-sub " href="<?php echo $person->getWebsite(); ?>" title="<?=_g('Website')?>">
        <?php echo htmlspecialchars($person->getName(), ENT_QUOTES, 'UTF-8'); ?>

      </a>
<?php endforeach; ?>
    </span>
    <span class="">
      <a class="sidebar-nav-item " href="atom.php" title="<?=_g('Syndicate')?>">
        <?=_g('Feed (ATOM)')?>
      </a>
    </span>
  </nav>
  <div class="sidebar-item">
    <p>
      &copy; 🄯 <?php echo date("Y"); ?> <?=_g('Some rights reserved.')?>

    </p>
  </div>
  <div class="sidebar-item">
    <p>
      <?php echo str_replace('%s', 'href="http://moonmoon.org"', _g('Powered by <a %s>moonmoon</a>'))?> <?=_g('and')?> <a href="https://lnk.web.id" title="Agregator Linux dan FOSS Indonesia">lnx</a>. <a href="./admin/"><?=_g('Administration')?></a>
    </p>
  </div>
</div>
