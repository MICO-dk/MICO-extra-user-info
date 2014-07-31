
<?php

/*
 * This class add's a headline for the extra user meta, useful for grouping together information
 *
 */

class HeadlineExtraUserInfo {

    public $headline;

    /*
     * Constructor for HeadlineExtraUserInfo
     *
     * @param String - The headline for the following extra user info fields
     */
    function __construct($headline) {

        $this->headline = $headline;
        
        add_action( 'show_user_profile', array($this, 'addHeadline'));
        add_action( 'edit_user_profile', array($this, 'addHeadline'));

    }

    function addHeadline() { 
    
        $headline = $this->headline; ?>

        <h3>
            <?php echo $headline; ?>
        </h3>
    
    <?php 
    }
}

?>

