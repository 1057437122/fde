<?php
#add upload img form in post page
function my_add_edit_form_multipart_encoding() {
    echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'my_add_edit_form_multipart_encoding');
function my_setup_meta_boxes() {
    add_meta_box('my_image_box', 'Upload Image', 'my_render_image_attachment_box', 'post', 'normal', 'high');//这个地方的参数大家可以去官方网站查看，我只是要说明一下第4个参数，如果想让post支持就填写post如果是page就填写page，如果是自定义类型就填写自定义类型的名称
}
add_action('admin_init','my_setup_meta_boxes');
function my_render_image_attachment_box($post) {
    // 显示添加的图片
    $existing_image_id = get_post_meta($post->ID,'_my_attached_image', true);
    if(is_numeric($existing_image_id)) {
        echo '<div>';
            $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
            $existing_image_url = $arr_existing_image[0];
            echo '<img src="' . $existing_image_url . '" />';
        echo '</div>';
    }
    // 如果已经上传了图片就提示
    if($existing_image) {
        echo '<div>Attached Image ID: ' . $existing_image . '</div>';
    } 
    echo 'Upload an image: <input type="file" name="my_image" id="my_image" />';
    // 获得图片的状态
    $status_message = get_post_meta($post->ID,'_my_attached_image_upload_feedback', true);
    // 显示图片状态
    if($status_message) {
        echo '<div class="upload_status_message">';
            echo $status_message;
        echo '</div>';
    }
    // 自动保存
    echo '<input type="hidden" name="my_manual_save_flag" value="true" />';
}
function my_update_post($post_id, $post) {
 //获得图片类型
    $post_type = $post->post_type;
    if($post_id && isset($_POST['my_manual_save_flag'])) { 
        switch($post_type) {
            case 'page':
                if(isset($_FILES['my_image']) && ($_FILES['my_image']['size'] > 0)) {
                    $arr_file_type = wp_check_filetype(basename($_FILES['my_image']['name']));
                    $uploaded_file_type = $arr_file_type['type'];
                    $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png');
                    if(in_array($uploaded_file_type, $allowed_file_types)) {
                        $upload_overrides = array( 'test_form' => false ); 
                        $uploaded_file = wp_handle_upload($_FILES['my_image'], $upload_overrides);
                        if(isset($uploaded_file['file'])) {
                            $file_name_and_location = $uploaded_file['file'];
                            $file_title_for_media_library = 'your title here';
                            $attachment = array(
                                'post_mime_type' => $uploaded_file_type,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );
                            $attach_id = wp_insert_attachment( $attachment, $file_name_and_location );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                            wp_update_attachment_metadata($attach_id,  $attach_data);
                            $existing_uploaded_image = (int) get_post_meta($post_id,'_my_attached_image', true);
                            if(is_numeric($existing_uploaded_image)) {
                                wp_delete_attachment($existing_uploaded_image);
                            }
                            update_post_meta($post_id,'_my_attached_image',$attach_id);
                            $upload_feedback = false;
                        } else { 
                            $upload_feedback = 'There was a problem with your upload.';
                            update_post_meta($post_id,'_my_attached_image',$attach_id);
                        }
                    } else { 
                        $upload_feedback = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'_my_attached_image',$attach_id);
                    }
                } else { 
                    $upload_feedback = false;
                }
                update_post_meta($post_id,'_my_attached_image_upload_feedback',$upload_feedback);
            break;
            default:
        } 
    return;
} 
    return;
}
add_action('save_post','my_update_post',1,2);