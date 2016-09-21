<?php
class Walker_Accordion_Woocommerce extends Walker_Category {
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        extract($args);

        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
        if ( $use_desc_for_title == 0 || empty($category->description) ) 
            $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
        else
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';

        if ( !empty($show_count) )
            $link .= ' <span class="li-count">(' . intval($category->count) . ')</span>';            

        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $class = 'cat-item cat-item-' . $category->term_id;

            $termchildren = get_term_children( $category->term_id, $category->taxonomy );
            if(count($termchildren)>0){
                $class .=  ' has-children';
                $link .= '<i class="fa fa-plus"></i>';
            }

            if ( !empty($current_category) ) {
                    $_current_category = get_term( $current_category, $category->taxonomy );
                    if ( $category->term_id == $current_category )
                            $class .=  ' current-cat';
                    elseif ( $category->term_id == $_current_category->parent )
                            $class .=  ' current-cat-parent';
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}