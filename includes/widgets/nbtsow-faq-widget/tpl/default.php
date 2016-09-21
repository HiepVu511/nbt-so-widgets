<div class="nbtsow-faqs-wrap">
    <h2 class="nbtsow-title"><?php esc_html_e($title); ?></h2>
    <div class="nbtsow-faqs">    
        <?php foreach($faqs as $faq): ?>
            <h3 class="nbtsow-faqs-question"><?php esc_html_e($faq['question']); ?></h3>
            <div class="nbtsow-faqs-answer">
                <p><?php esc_html_e($faq['answer']); ?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>