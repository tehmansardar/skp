<div>
    <h1>Skontech Plugin</h1>

    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <?php
        settings_fields('skp_option_group');
        do_settings_sections('skp');
        submit_button();
        ?>
    </form>

</div>