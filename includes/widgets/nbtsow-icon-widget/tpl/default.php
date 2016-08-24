<div class="nbtsow-icon-list-wrap">

    <?php foreach($icon_list as $icon_section):
    $icon_styles = array();
    if(!empty($icon_section['icon_size'])) 
        $icon_styles[] = 'font-size: ' . intval($icon_section['icon_size']).'px';
    if(!empty($icon_section['icon_color'])) 
        $icon_styles[] = 'color: ' . $icon_section['icon_color'];
    ?>
    <div class="nbtsow-icon-section">
        <?php if($icon_section['icon_url']): ?>
        <a href="<?php echo esc_url($icon['icon_url']); ?>">
        <?php endif; ?>
            <?php if($icon_section['icon']):

            echo siteorigin_widget_get_icon( $icon_section['icon'], $icon_styles );

            endif;

            if($icon_section['icon_text']): ?>

            <span class="nbtsow-icon-text">
                <?php echo esc_attr($icon_section['icon_text']); ?>
            </span>

            <?php endif ;?>
        <?php if($icon_section['icon_url']): ?>
        </a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

</div>