<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $meta_viewport ? '' : '<meta name="viewport" content="width=device-width, initial-scale=1.0" />'; ?>
<meta name="robots" content="NOODP" />
<meta name="language" content="EN" />
<meta name="subject" content="<?php echo $MANIFEST->type; ?>" />
<meta name="description" content="<?php echo $meta_desc ? $meta_desc : $MANIFEST->meta["desc"]; ?>" />
<meta name="keywords" content="<?php echo $MANIFEST->meta["keywords"]; ?>" />
<meta name="author" content="<?php echo $MANIFEST->meta["author"]; ?>" />
<meta name="copyright" content="<?php echo $MANIFEST->copyright; ?>" />
<meta name="owner" content="<?php echo $MANIFEST->client["company"]; ?>" />
<meta name="reply-to" content="<?php echo $MANIFEST->mailto["contact"]; ?>" />
<meta name="url" content="<?php echo $MANIFEST->url; ?>" />
<meta name="rating" content="General" />
<meta name="revised" content="<?php echo $MANIFEST->bundle; ?>" />
<title><?php echo $meta_title ? $meta_title : strtoupper($meta_page).' ('.$MANIFEST->domain.')'; ?></title>
