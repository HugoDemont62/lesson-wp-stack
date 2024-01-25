<?php
/**
 * This file is part of the AmphiBee package.
 * (c) AmphiBee <contact@amhibee.fr>
 */


namespace Portfolio;

class Metaboxes
{
    public function register(): void
    {
        add_action('add_meta_boxes', [$this, 'custom_metabox']);
        add_action('save_post', [$this, 'save_custom_metabox_data']);
    }

    public function custom_metabox(): void
    {
        add_meta_box(
            'portfolio_metabox',
            'Informations additionnelles',
            [$this, 'render_custom_metabox'],
            PostType::SLUG,
            'normal',
            'default'
        );
    }

    public function render_custom_metabox($post): void
    {
        $date_value = get_post_meta($post->ID, 'custom_date_field', true); // Get the saved date value
        ?>
        <label for="custom_date_field">Date du projet :</label>
        <input type="date" id="custom_date_field" name="custom_date_field" value="<?php echo esc_attr($date_value); ?>">
        <?php
    }

    public function save_custom_metabox_data($post_id): void
    {
        if (array_key_exists('custom_date_field', $_POST)) {
            update_post_meta(
                $post_id,
                'custom_date_field',
                sanitize_text_field($_POST['custom_date_field'])
            );
        }
    }
}
