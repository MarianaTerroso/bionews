<section id="last-news">
    <header>
        <h1 class="main-title">Últimas Notícias</h1>
        <h2 class="main-date"><?php echo date("Y/m/d")?>
        </h2>
    </header>
    <hr class="content-divider">
    <div class="main-news">
        <?php if (getNumberofNews() == 0) { ?>
            <p>Sem Notícias</p>
        <?php } else {
            $news_s=getListNews($page);
            foreach($news_s as $news) {
                if($news['id']% 2 != 0){?>
                    <div class="first-new">
                        <div class="content-index">
                            <div class="image">
                                <img src="img/newsphotos/<?php echo $news['id']?>.jpg" alt="News photo" class= "notice_thumb">
                            </div>
                            <?php foreach (getTagByNew($news['id']) as $tag) {
                             ?>
                                <a class="tag-new"><?php echo $tag['tag'] ?></a>
                            <?php
                            }?>

                            <h2 class="news-title-index"><a class="news-title-index" title="Notícia Completa" href="newspage.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']?></a></h2>
                            <div class="lead"><?php echo $news['summary']?></div>
                        </div>
                    </div>
                <?php } else {?>
                    <div class="second-new">
                        <div class="content-index">
                            <div class="image">
                                <img src="img/newsphotos/<?php echo $news['id']?>.jpg" alt="News photo" class= "notice_thumb">
                            </div>
                            <?php
                            foreach (getTagByNew($news['id']) as $tag) {
                                ?>
                                <a class="tag-new"><?php echo $tag['tag'] ?></a>
                                <?php
                            }?>
                            <h2 class="news-title-index"><a class="news-title-index" title="Notícia Completa" href="newspage.php?id=<?php echo $news['id'] ?>"><?php echo $news['title']?></a></h2>
                            <div class="lead"><?php echo $news['summary']?></div>
                        </div>
                    </div>
                <?php }
            }
        }?>
    </div>
    <div id="pagination">
    <?php if ($page > 1) { ?>
      <a class="pages" href="?page=<?php echo $page-1; ?>">&lt;</a>
    <?php } else { ?>
      <a class="pages" href="" class="hidden">&lt;</a>
    <?php } ?>
    
    <?php echo $page; ?>

    <?php if ($page < $n_pages) { ?>
      <a class="pages" href="?page=<?php echo $page+1; ?>">&gt;</a>
    <?php } else { ?>
      <a class="pages" href="" class="hidden">&gt;</a>
    <?php } ?>
  </div>
</section>