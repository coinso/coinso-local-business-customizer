<?php
if( ! defined( 'ABSPATH' ) ) {
    return;
}
?>
<div class="wrap lbs-info-wrap">
    <h1>Coisno Local Business Customizer</h1>
    <h2>Settings</h2>
    <?php settings_errors();?>
    <form class="admin-lead-form-options" method="post" action="options.php">
        <?php
            settings_fields('coinso_lbc_location_setting_group');
//            do_settings_sections('coinso_lbc_location_setting_group');
            
            $brand_name = get_option('coinso_lbc_location_brand_name');
            print_r($brand_name);
        ?>
        <table class="form-table">
            <tbody>
            <!-- Brand Name -->
            <tr>
                <th>
                    <label for="coinso_lbc_brand_name"><?php echo _x('Brand Name', 'coinso_lbc');?></label>
                </th>
                <td>
                    <input
                            type="text"
                            name="coinso_lbc_brand_name"
                            id="coinso_lbc_location_brand_name"
                            value="<?php echo esc_attr($brand_name) ?>"
                            class="regular-text"
                            placeholder="<?php echo esc_attr($brand_name);?>"
                    >
                </td>
            </tr>
            </tbody>
        </table>
        <hr>
        <?php submit_button(); ?>
    </form>
</div>