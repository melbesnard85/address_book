<?php
    // Include config file
    require_once "../config/env.php";
    require_once "../common/global.php";

    $treeData = array();

    function getGroupData($con) {
        // Get group array
        $groupQuery = "select id, name, parent_id, pos, level from groups";
        $groupRecords = mysqli_query($con, $groupQuery);
        $groups = array();
    
        while ($groupRow = mysqli_fetch_assoc($groupRecords)) {
            $groups[] = array(
                "id"=>$groupRow['id'],
                "name"=>$groupRow['name'],
                "parent_id"=>$groupRow['parent_id'],
                "pos"=>$groupRow['pos'],
                "level"=>$groupRow['level']
            );
        };
        return $groups;
    }

    $groupData = getGroupData($link);

    // Generate tree structure:
    $groupsById = array();
    for($i = 0, $c = count($groupData); $i < $c; $i++) {
        $group = &$groupData[$i];
        $group['children'] = array();
        $group['icon'] = "fa fa-folder icon-lg leap";
        $group['text'] = $group['name'];
        $groupsById[$group["id"]] = &$group;

    }
    $treeData = array();
    for($i = 0, $c = count($groupData); $i < $c; $i++) {
        $group = &$groupData[$i];
        $parent_id = $group["parent_id"];
        if (!isset($groupsById[$parent_id])) {
            $treeData[] = &$group;
        } else {
            $parent = &$groupsById[$parent_id];
            $parent['icon'] = "fa fa-folder icon-lg";
            $parent['children'][] = &$group;
        }
    }

    header('Content-type: text/json');
    header('Content-type: application/json');
    header('Access-Control-Allow-Origin: *');
    echo json_encode($treeData);
?>