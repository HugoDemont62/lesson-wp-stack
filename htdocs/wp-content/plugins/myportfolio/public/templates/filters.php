<?php
global $wp;
$action = home_url( $wp->request );
?>
<form method="post" action="<?php echo $action; ?>">
    <?php $area = get_field_object('area'); ?>
    <?php if ($area) : ?>
        <?php
        $choices = $area['choices'];
        $value = get_field('area');
        ?>
        <label>
            <select class="acf-filter" name="filter-area">
                <?php foreach ($choices as $value => $choice) : ?>
                    <option value="<?php echo $value ?>"
                        <?php echo $_POST && $_POST['filter-area'] === $value ? 'selected' : '' ?>>
                        <?php echo $choice ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
    <?php endif; ?>

    <label>
        <input class="acf-filter" type="date" name="filter-date" />
    </label>
    <input type="submit" value="OK">
</form>
