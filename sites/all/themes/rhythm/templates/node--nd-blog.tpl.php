<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
hide($content['comments']);
hide($content['links']);
hide($content['links']['comment']);
hide($content['links']['node']);
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
    
  <?php if($teaser): ?>
    <div class="blog-item">
      <div class="blog-item-date">
          <span class="date-num"><?php print date('d', $created); ?></span><?php print date('M', $created); ?>
      </div>

      <!-- Post Title -->
      <h2 class="blog-item-title font-alt"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      
      <!-- Author, Categories, Comments -->
      <div class="blog-item-data">
          <a href="#"><i class="fa fa-clock-o"></i> <?php print date('d F', $created); ?> </a>
          <span class="separator">&nbsp;</span>
          <a href="#"><i class="fa fa-user"></i> <?php print strip_tags($name); ?></a>
          <span class="separator">&nbsp;</span>
          <?php if(isset($content['field_blog_category'])): ?>
            <i class="fa fa-folder-open"></i>
            <?php print render($content['field_blog_category']); ?>
            <span class="separator">&nbsp;</span>
          <?php endif; ?>
          <a href="#"><i class="fa fa-comments"></i> <?php print $comment_count . ' ' . t('Comments'); ?></a>
      </div>
      
      <!-- Text Intro -->
      <div class="blog-item-body">
          <?php print render($content); ?>
      </div>
      
      <!-- Read More Link -->
      <div class="blog-item-foot">
          <a href="<?php print $node_url; ?>" class="btn btn-mod btn-round  btn-small"><?php print t('Read More'); ?> <i class="fa fa-angle-right"></i></a>
      </div>
        
    </div>

  <?php else: ?>

    <?php print $user_picture; ?>

    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <div class="submitted">
        <?php print $submitted; ?>
      </div>
    <?php endif; ?>

    <div class="blog-item mb-80 mb-xs-40"<?php print $content_attributes; ?>>
      <div class="blog-item-body">
        <?php print render($content); ?>
      </div>
    </div>

    <?php print render($content['links']); ?>
    <div class="mb-80 mb-xs-40">
      <?php print render($content['comments']); ?>
    </div>

    <div class="clearfix mt-40">
      <a href="<?php print url('node/' . $node->prev->nid); ?>" class="blog-item-more left"><i class="fa fa-angle-left"></i>&nbsp;<?php print t('Prev post'); ?></a>
      <a href="<?php print url('node/' . $node->next->nid); ?>" class="blog-item-more right"><?php print t('Next post'); ?>&nbsp;<i class="fa fa-angle-right"></i></a>
    </div>
  <?php endif; ?>

</div>
