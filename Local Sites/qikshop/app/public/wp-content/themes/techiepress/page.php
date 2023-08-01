<?php get_header()?>



<?php 
    if(have_posts()):the_post();?>

<div
    class="tw-text-40 tw-w-full tw-text-center tw-py-[6rem] tw-font-medium tw-uppercase tw-border-purple8 tw-border-b-[2px] md:tw-py-[3rem] md:tw-text-24 md:tw-border-b-[1.5px]">
    <?php  the_title(); ?>
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