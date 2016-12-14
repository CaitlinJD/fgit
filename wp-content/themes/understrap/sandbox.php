<?php /* Template Name: Sandbox */ ?>

<?php


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function Generate_Featured_Image( $image_url, $post_id  ){
    $generated_string = generateRandomString();
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);

    $file_parts = pathinfo($image_url);
    $file_type = $file_parts['extension'];
    echo $image_url."  ";
    echo $file_type."  ";

    $filename = basename($generated_string.".".$file_type);
    echo $filename."<br>";

    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

$var = new event_build;
$var->build_event();

//Generate_Featured_Image ('https://cdn.evbuc.com/images/25674446/3213628023/1/logo.jpg', 1041);


?>
