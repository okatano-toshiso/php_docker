<?php
$comments = strip_tags($_POST['comments']);
print $comments;
$comments = htmlentities($_POST['comments']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST;
} else {
    $defaults = array(
        'delivery' => 'yes',
        'size' => 'medium',
        'main_dish' => array('taro','tripe'),
        'sweet' => 'cake'
    );
}

print '<input type="text" name="my_name" value="' .
htmlentities($defaults['my_name']). '">';


print '<textarea name="comments">';
print htmlentities($defaults['comments']);
print '</textarea>';

$sweets = array(
    'puff' => 'Sesame Seed Puff',
    'square' => 'Coconut Milk Gelatin Square',
    'cake' => 'Brown Sugar Cake',
    'ricemeat' => 'Sweet Rice and Meat'
);
print '<select name="sweet">';
// $optionはオプション値、$labelは表示内容
foreach ($sweets as $option => $label) {
    print '<option value="' .$option .'"';
    if ($option == $defaults['sweet']) {
        print ' selected';
    }
    print "> $label</option>\n";
}
print '</select>';

$main_dishes = array(
    'cuke' => 'Braised Sea Cucumber',
    'stomach' => "Sauteed Pig's Stomach",
    'tripe' => 'Sauteed Tripe with Wine Sauce',
    'taro' => 'Stewed Pork with Taro',
    'giblets' => 'Baked Giblets with Salt',
    'abalone' => 'Abalone with Marrow and Duck Feet'
);
print '<select name="main_dish[]" multiple>';
$selected_options = array();

foreach ($defaults['main_dish'] as $option) {
    $selected_options[$option] = true;
}
// <option>タグを出力する
foreach ($main_dishes as $option => $label) {
    print '<option value="' . htmlentities($option) . '"';
    if (array_key_exists($option, $selected_options)) {
        print ' selected';
    }
    print '>' . htmlentities($label) . '</option>';
    print "\n";
}
print '</select>';

print '<input type="checkbox" name="delivery" value="yes"';
if ($defaults['delivery'] == 'yes') {
    print ' checked';
}
print '> Delivery?';
$checkbox_options = array(
    'small' => 'Small',
    'medium' => 'Medium',
    'large' => 'Large'
);

foreach ($checkbox_options as $value => $label) {
    print '<input type="radio" name="size" value="'.$value.'"';
    if ($defaults['size'] == $value) {
        print ' checked';
    }
    print "> $label ";
}
