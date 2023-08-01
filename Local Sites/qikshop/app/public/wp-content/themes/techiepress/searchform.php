<form role="search" method="get" class="search-form tw-flex tw-items-center" :class="open?'tw-gap-[1rem]':'' "
    action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search"
        class="tw-w-full tw-bg-[transparent] tw-outline-[0] tw-transition-[max-width] md:tw-max-w-[unset]"
        :class="open?'tw-p-[.5rem] tw-max-w-[120px]':'tw-max-w-[0]' " style="border-bottom:1px solid rgba(0,0,0,.4)"
        placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>"
        value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit">
        <img src="<?php echo(get_template_directory_uri().'/assets/images/search_icon.svg') ?>" alt=""
            class="!tw-h-[1.5rem] tw-min-w-[1.5rem] md:tw-hidden ">
    </button>
    <input type="hidden" name="post_type" value="product" id="post_type">
</form>