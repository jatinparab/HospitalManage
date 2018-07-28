<?php

    $this -> session -> unset_userdata('logged_in');
    header("Refresh:2; url=login");
    echo "Successfully logged out..";


?>