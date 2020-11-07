<div class="wrap">
    <h1>Skontech Plugin</h1>

    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Update</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div class="active tab-pane" id="tab-1">
            <form method="post" action="options.php">
                <?php
                settings_fields('skp_settings');
                do_settings_sections('skp');
                submit_button();
                ?>
            </form>
        </div>

        <div class="tab-pane" id="tab-2">
            <h3>Settings</h3>
        </div>

        <div class="tab-pane" id="tab-3">
            <h3>About</h3>
        </div>
    </div>
</div>