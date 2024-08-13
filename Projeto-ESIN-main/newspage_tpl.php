<section id="news-page">
        <section id="noticia">
            <article>
                <header>
                    <div class="news-header">
                        <h2 class="news-title"><?php echo getTitleNewsById($id)?></h2>
                        <p class="news-summary"><?php echo getSummaryNewsById($id)?></p>
                    </div>
                </header>
                <div class="author-date">
                    <h4 class="author">Por <?php echo getAuthorNewsById($id)?></h4>
                    <h5 class="date"><?php echo getDateNewsById($id)?></h5>
                </div>
                <hr class="content-divider">

                <?php if (getAdmByEmail($_SESSION["email"])) {?>
                    <div class="edit-and-delete-news">
                        <a class="edit" href="edit-news.php?id=<?php echo $id ?>">Editar</a>
                        <a class="delete" href="action_delete-news.php?id=<?php echo $id ?>">Eliminar</a> <!-- ver aqui qual é o nome da action-->
                    </div>
                <?php } ?>

                <div class="news-content">
                    <img class="robotics-img" src="img/newsphotos/<?php echo $id?>.jpg" alt="Robotics" height="400" width="800">
                    <p class="news-text"><?php echo getTextNewsById($id)?></p>
                </div>

                <div class="reactions-news">
                    <?php if (!reactedNews('like',getIdPersonByEmail($_SESSION['email']),$id)){?>
                        <form method='post' action="action_like-news.php?id=<?php echo $id ?>">
                            <button class="button-like" type="submit" name="like" value="like"><img class="like" src="img/hand-thumbs-up.svg" alt="Like" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'like') ?>
                        </form>
                    <?php } else { ?>
                        <form method='post' action="action_unlike-news.php?id=<?php echo $id ?>">
                            <button class="button-like" type="submit" value="like"><img class="like" src="img/hand-thumbs-up-fill.svg" alt="Like" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'like') ?>
                        </form>
                    <?php }?>

                    <?php if (!reactedNews('dislike',getIdPersonByEmail($_SESSION['email']),$id)){?>
                        <form method='post' action="action_dislike-news.php?id=<?php echo $id ?>">
                            <button class="button-dislike" type="submit" name="dislike" value="dislike"><img class="dislike" src="img/hand-thumbs-down.svg" alt="Dislike" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'dislike') ?>
                        </form>
                    <?php } else { ?>
                        <form method='post' action="action_undislike-news.php?id=<?php echo $id ?>">
                            <button class="button-dislike" type="submit" value="dislike"><img class="dislike" src="img/hand-thumbs-down-fill.svg" alt="Dislike" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'dislike') ?>
                        </form>
                    <?php }?>

                    <?php if (!reactedNews('love',getIdPersonByEmail($_SESSION['email']),$id)){?>
                        <form method='post' action="action_love-news.php?id=<?php echo $id ?>">
                            <button class="button-love" type="submit" name="love" value="love"><img class="love" src="img/heart.svg" alt="Love" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'love') ?>
                        </form>
                    <?php } else { ?>
                        <form method='post' action="action_unlove-news.php?id=<?php echo $id ?>">
                            <button class="button-love" type="submit" value="love"><img class="love" src="img/heart-fill.svg" alt="Love" height="30" width="30" ></button>
                            <?php echo getNumberOfReactionNews($id,'love') ?>
                        </form>
                    <?php }?>

                    <?php if (!savedNews(getIdPersonByEmail($_SESSION['email']),$id)){?>
                        <form method='post' action="action_save.php?id=<?php echo $id ?>">
                            <button class="button-save" type="submit" name="save" value="save"><img class="save" src="img/bookmark.svg" alt="Like" height="30" width="30" ></button>
                        </form>
                    <?php } else { ?>
                        <form method='post' action="action_unsave.php?id=<?php echo $id ?>">
                            <button class="button-save" type="submit" value="save"><img class="save" src="img/bookmark-fill.svg" alt="save" height="30" width="30" ></button>
                        </form>
                    <?php }?>

                </div>

                <section id="comments">
                    <h4 class="comments-title">Comentários</h4>
                    <div class="comments-section">
                        <div class="commentlist-container">
                            <ul class="comment-list">
                                <?php if (getNumberofComments() == 0) { ?>
                                    <p>Sem Comentários</p>
                                <?php } else {
                                    $comments = getListComments($id);
                                    foreach($comments as $comment) {
                                        if ($comment['news']==$id) {?>
                                            <li class="first-comment">
                                                <div class="comment-content">
                                                    <div class="comment-author">
                                                        <img class="profileimg" src="img/profiles/<?php echo $comment['person']?>.jpg" alt="Profile" height="30" width="30">
                                                        <div class="name"><?php echo getNamePersonById($comment['person'])?></div>
                                                    </div>
                                                    <div class="date-comment">
                                                        <p class="date-firstcomment"><?php echo ($comment['publication_date'])?></p>
                                                    </div>
                                                    <p class="comment-text"><?php echo ($comment['text'])?></p>

                                                    <div class="react-comment">

                                                        <?php if (!reactedComment('like',getIdPersonByEmail($_SESSION['email']),$comment['id'])) {?>
                                                            <form method='post' action="action_like-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-likecomment" type="submit"  value="like">Gosto</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'like') ?>
                                                            </form>
                                                        <?php } else {?>
                                                            <form method='post' action="action_unlike-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-unlikecomment" type="submit"  value="like">Gosto</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'like') ?>
                                                            </form>
                                                        <?php }?>

                                                        <?php if (!reactedComment('dislike',getIdPersonByEmail($_SESSION['email']),$comment['id'])) {?>
                                                            <form method='post' action="action_dislike-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-dislikecomment" type="submit"  value="dislike">Não Gosto</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'dislike') ?>
                                                            </form>
                                                        <?php } else {?>
                                                            <form method='post' action="action_undislike-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-undislikecomment" type="submit"  value="dislike">Não Gosto</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'dislike') ?>
                                                            </form>
                                                        <?php }?>

                                                        <?php if (!reactedComment('love',getIdPersonByEmail($_SESSION['email']),$comment['id'])) {?>
                                                            <form method='post' action="action_love-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-lovecomment" type="submit"  value="love">Adoro</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'love') ?>
                                                            </form>
                                                        <?php } else {?>
                                                            <form method='post' action="action_unlove-comment.php?id=<?php echo $comment['id'] ?>">
                                                                <button class="button-unlovecomment" type="submit"  value="like">Adoro</button>
                                                                <?php echo getNumberOfReactionComment($comment['id'],'love') ?>
                                                            </form>
                                                        <?php }?>

                                                        <form method='post' action="action_report-comment.php?id=<?php echo $comment['id'] ?>">
                                                            <button class="reportcomment" type="submit" name = "report" value="report">Denunciar</button>
                                                        </form>
                                                        <?php
                                                        if($comment['person'] === getIdPersonByEmail($_SESSION['email']) || getAdmByEmail($_SESSION['email'])){
                                                            ?>
                                                            <form method='post' action="action_delete-comment.php?id=<?php echo $comment['id']?>">
                                                                <button class="button-deletecomment" type="submit"  value="delete">Eliminar</button>
                                                            </form>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                            </li>
                                        <?php }
                                    }
                                }?>
                            </ul>
                        </div>

                        <form class="form_news" action="action_comment.php?id=<?php echo $id ?>" method="post">
                            <h2 class="formtitle">Adicione um comentário...</h2>
                            <label class="email">Comentário
                                <textarea name="comment"></textarea>
                            </label>
                            <button class="filled-button button-submit">Enviar</button>
                        </form>
                    </div>
                </section>
            </article>
            <hr class="content-divider">
        </section>
        <section id="related-news">
            <h2 class="related-title">Notícias relacionadas</h2>
            <?php
            $count = 0;
            foreach (getTagByNew($id) as $tag){
                if(getNumberofRelatedNews($tag['tag'])){
                    $count = $count + 1;
                }
            }
            if ($count == 1) {
                $set = array();
                ?>
                <p>Sem Notícias Relacionadas</p>
            <?php } else {
                $set = array();
                foreach (getTagByNew($id) as $tag) {
                    $relatednews=getListRelatedNews($tag['tag']);
                    foreach($relatednews as $related) {
                        if ($related['news'] != $id){
                            if(!in_array($related['news'],$set)){
                                array_push($set, $related['news']);
                            }
                        }
                    }
                }
            }?>
            <?php
            foreach ($set as $noticia) {
                ?>
                <div class="related-new">
                    <img class="img" src="img/newsphotos/<?php echo $noticia?>.jpg" alt="Imagem Notícia Relacionada" height="190" width="290"> <!-- mudei aqui para a class para img -- ver css-->
                    <div class="relatednew-content">
                        <?php
                        foreach (getTagByNew($noticia) as $tag){
                            ?>
                            <h6 class="relatednew-tag"><?php echo $tag['tag'];?></h6>
                            <?php
                        }
                        ?>
                        <h4 class="relatednew-title"><a class="relatednew-title" title="Notícia Completa" href="newspage.php?id=<?php echo $noticia; ?>"><?php echo getTitleNewsById($noticia) ?></a></h4>
                        <p class="relatednew-description"><?php echo getSummaryNewsById($noticia) ?></p>
                    </div>
                </div>
            <?php
             }
            ?>
        </section>
    </section>