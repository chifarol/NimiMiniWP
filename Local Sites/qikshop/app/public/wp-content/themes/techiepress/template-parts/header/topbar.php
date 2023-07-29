<?php 



 ?>

<div class="tw-h-[4rem] tw-flex tw-items-center tw-w-full tw-border-purple8 tw-border-b-[2px] t-px-[2.5rem]">


    <a href="<?php echo home_url() ?>" class="tw-px-[2.5rem] tw-w-full tw-font-morphend tw-text-[2.6rem]">
        <?php  bloginfo("name") ?>
    </a>

    <div class="tw-flex tw-items-center tw-h-full">

        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-l-[2px] tw-border-purple8">
            <img src="<?php echo(get_template_directory_uri().'/assets/images/search_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
        </div>
        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-l-[2px] tw-border-purple8">
            <img src="<?php echo(get_template_directory_uri().'/assets/images/account_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
        </div>
        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-purple8 tw-border-l-[2px]">
            <img src="<?php echo(get_template_directory_uri().'/assets/images/shopping_bag_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
        </div>
    </div>
</div>