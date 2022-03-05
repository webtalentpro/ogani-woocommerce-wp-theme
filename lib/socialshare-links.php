
<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>" title="Share on Facebook" target="_blank"><i class="fa fa-facebook-f"></i></a>

<a href="https://www.twitter.com/share?url=<?= get_permalink(); ?>&text=<?= get_the_title(); ?>" title="Share on Twitter" target="_blank"><i class="fa fa-twitter"></i></a>

<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>" title="Share on Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>

<a href="mailto:?subject=<?= get_the_title(); ?> - <?= site_url(); ?>&body=I found this post on <?= site_url(); ?> and thought it would interest you.%0D%0A%0D%0A<?= get_the_title(); ?>%0D%0A<?= get_permalink(); ?>" title="Send
    to an E-mail" target="_blank"><i class="fa fa-envelope"></i></i> </a>