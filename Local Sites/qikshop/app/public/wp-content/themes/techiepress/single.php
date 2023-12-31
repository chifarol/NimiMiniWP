<?php get_header()?>



<?php 
    if(have_posts()):the_post();?>

<div class="tw-p-[2.5rem] tw-border-purple8 tw-border-b-[2px] md:tw-border-b-[1.5px] md:tw-p-[1.5rem_1rem]">
    <div class="tw-text-40 tw-w-full tw-text-center tw-mb-[1rem] tw-font-medium tw-uppercase md:tw-text-24">
        <?php  the_title(); ?>
    </div>
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <div class="tw-w-full tw-h-[360px] tw-border-purple8 tw-border-[2px] tw-border-[1.5px]">
        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" alt=""
            class="tw-w-full tw-h-full tw-object-cover">

    </div>
    <?php endif ?>
</div>
<div
    class="tw-mx-[auto] tw-w-full tw-text-justify tw-max-w-[1000px] tw-p-[3rem] tw-border-purple8 tw-border-l-[2px] tw-border-r-[2px] md:tw-p-[2rem_1.5rem] md:tw-border-l-[0] md:tw-border-r-[0]">
    <?php  the_content(); ?>
</div>

<?php
    endif
 ?>



<?php
get_footer()
?>