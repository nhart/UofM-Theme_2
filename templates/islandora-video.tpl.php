<?php

/**
 * @file
 * This is the template file for the object page for video
 *
 * Available variables:
 * - $islandora_object: The Islandora object rendered in this template file
 * - $islandora_dublin_core: The DC datastream object
 * - $dc_array: The DC datastream object values as a sanitized array. This
 *   includes label, value and class name.
 * - $islandora_object_label: The sanitized object label.
 * - $parent_collections: An array containing parent collection(s) info.
 *   Includes collection object, label, url and rendered link.
 *
 * @see template_preprocess_islandora_video()
 * @see theme_islandora_video()
 */
 $collection_pids = array(); // To hold parent collection pids for Google Analytics
 
?>

<div class="islandora-video-object islandora" itemscope itemtype="http://schema.org/VideoObject">
  <div class="islandora-video-content-wrapper clearfix">
    <?php if ($islandora_content): ?>
      <div class="islandora-video-content">
        <?php print $islandora_content; ?>
      </div>
    <?php endif; ?>
  <div class="islandora-video-sidebar">
    <?php if ($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $collection): ?>
        <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
          <?php $collection_pids[] = $collection->id; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
  </div>
</div>
<script type="text/javascript">
<!--
  var _gaq = _gaq || [];
  _gaq.push(['_setCustomVar', 1, 'PID', '<?php print $object->id;?>', 3]);
  _gaq.push(['_setCustomVar', 2, 'Collection', '<?php print implode($collection_pids,'|');?>', 3]);
  _gaq.push(['_setCustomVar', 3, 'Title', '<?php print $islandora_object_label;?>', 3]);
//-->
</script>

