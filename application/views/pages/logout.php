<?php

    $this -> session -> unset_userdata('logged_in');
    header("Refresh:1; url=login");
    echo "Successfully logged out..";
?>