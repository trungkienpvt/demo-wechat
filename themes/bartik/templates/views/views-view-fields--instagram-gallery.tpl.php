<?php
global $hashtag,$count, $arrResults,$tmp_key;
$nid = $fields['nid']->content;
$node = node_load($nid);
$view = views_get_current_view();
$total = $view->total_rows;
if(empty($count)){
    $count = 1;
}
if(!empty($node)){
$hastag_field = field_get_items('node', $node,'field_instf_hash_tags');
$field_image = field_get_items('node', $node, 'field_instf_image_url');
if(isset($field_image[0]['url']) && !empty($field_image[0]['url'])){
    $image_url = $field_image[0]['url'];

}
else{
    $image_url = '';
}
if(!empty($image_url))
    $arrResults[$hastag_field[0]['tid']][] = $image_url;


?>
    <?php
    if(empty($count)):
        $count = 1;
    ?>
        <?php elseif($count == $total):
        ?>
        <?php
        if(!empty($arrResults)):
            ?>
            <div>
        <?php
            foreach ($arrResults as $items):?>
                <ul class="instagram-list">
            <?php
                foreach ($items as $item):?>
                <li><img src="<?php print($item)?>" width="200px" height="200px"/> </li>
                <?php endforeach;
                ?>
                </ul>

            <?php endforeach;
            ?>
            </div>
        <?php endif;
        ?>
        <?php else:?>
        <?php $count++;?>
    <?php endif?>


<?php
}
?>