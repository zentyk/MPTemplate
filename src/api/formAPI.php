<?php
$name = '';
$password = '';
$role = '';
$color = '';
$languages = [];
$comments = '';
$tc = '';

if (isset($_POST['submit'])) {
    if(!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Name is required']);
        exit;
    }

    if(!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Password is required']);
        exit;
    }

    if(!empty($_POST['role'])) {
        $role = htmlspecialchars($_POST['role']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Role is required']);
        exit;
    }

    if(!empty($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Color is required']);
        exit;
    }

    if(!empty($_POST['languages']) && is_array($_POST['languages'])) {
        $languages = $_POST['languages'];
        foreach($languages as $key => $value) {
            $languages[$key] = htmlspecialchars($value);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'At least one language is required']);
        exit;
    }

    if(!empty($_POST['comments'])) {
        $comments = htmlspecialchars($_POST['comments']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Comments are required']);
        exit;
    }

    if(!empty($_POST['tc'])) {
        $tc = htmlspecialchars($_POST['tc']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Terms and Conditions must be accepted']);
        exit;
    }

    echo json_encode(
        [
            'name'=>$name,
            'password'=>$password,
            'role'=>$role,
            'color'=>$color,
            'languages'=>$languages,
            'comments'=>$comments,
            'tc'=>$tc
        ]
    );
} else {
    print_r('No data submitted');
}