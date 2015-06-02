<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<!-- style: To match with the carousel. To look like 12px border around the map. Depends on size of map -->
<div class="row" align="center"  style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.25));
     width: 900px; height: 474px; padding-top: 12px; margin-left: 0; margin-right: 0;">

<?php print $output; ?>
</div>

<!--background-image:
right---linear-gradient(to right, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.5) 100%)
left---linear-gradient(to right, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.5) 100%);-->
