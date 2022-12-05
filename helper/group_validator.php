<?php
    // Validate group
    $input_group = trim($_POST["name"]);
    if(empty($input_group)){
        $group_name_err = "Please enter a group.";
    } else{
        $group_name = $input_group;
    }

    // Validate parent_id
    $input_parent_id = trim($_POST["parent_id"]);
    if(empty($input_parent_id)){
        $parent_id_error = "Please select a group id.";
    } else{
        $parent_id = $input_parent_id;
    }