<?php

/*
 * This class lets the user add extra user information and adds a field for this on the administration profile page
 *
 */

class ExtraUserInfo {

    public $field_name;
    public $field_title;
    public $field_description;

    public $settings = array();

     /*
     * Constructor for HeadlineExtraUserInfo
     *
     * @param array     An array containing the title and description for the extra user info field,
     *                  as well as a name for the field
     */
    function __construct($args) {

        $this->field_name = $args['field_name'];
        $this->field_title = $args['field_title'];
        $this->field_description = $args['field_description'];

        add_action( 'show_user_profile', array($this, 'ExtraUserInfo_add'));
        add_action( 'edit_user_profile', array($this, 'ExtraUserInfo_add'));

        add_action('personal_options_update', array($this, 'ExtraUserInfo_update'));
        add_action( 'edit_user_profile_update', array($this, 'ExtraUserInfo_update'));

    }

    /*
     * Adds the field for the extra user info
     */
    function ExtraUserInfo_add($user) {

        $field_val = get_user_meta($user->ID, $this->field_name);

        if(is_array($field_val)) :

            if(empty($field_val)) :
                $field_val[0] = "";
            endif;
            
            $field_val = $field_val[0];
        endif;

        ?>
        <table class="form-table">
            <tr>
                <th>
                    <label for="<?php echo $this->field_name; ?>">
                        <?php echo $this->field_title; ?>
                    </label>
                </th>
                <td>
                    <input  
                        type="text" 
                        id="<?php echo $this->field_name; ?>"
                        name="<?php echo $this->field_name; ?>"
                        value="<?php echo $field_val; ?>"/>
                    <br/>
                    <span class="description">
                         <?php echo $this->field_description; ?>
                    </span>
                </td>
            </tr>
        </table>

    <?php

    }

    /*
     * Saves the field for the extra user info
     */
    function ExtraUserInfo_update($user_id) {

        if(!current_user_can('edit_user', $user_id)) :
            return false;
        endif;

        update_user_meta($user_id, $this->field_name, $_POST[$this->field_name]);
    }

}

?>