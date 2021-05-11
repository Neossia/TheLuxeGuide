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
if ($teaser) { ?>
  <div class = "col-default col-md-3 col-lg-3 mb-60">
    <div class="post-prev-img">
      <?php print render($content['product:field_images']); ?>
      
      <?php print render($content['product:field_sale_text']); ?>
        
    </div>
    
    <div class="post-prev-title font-alt align-center">
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <?php print $title; ?>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
    </div>

    <div class="post-prev-text align-center">
        <del class="section-text"><?php print render($content['product:field_old_price']); ?></del>
        &nbsp;
        <?php print render($content['product:commerce_price']); ?>
    </div>
    
    <div class="post-prev-more align-center">
       <?php print render($content); ?>
    </div>
  </div>
<?php }
else {
  $fields = array('field_corner_text');
  $comments_array = isset($content['comments']['comments']) ? array_filter($content['comments']['comments'], '_count_comments') : array();
  hide($content['body']); hide($content['comments']); hide($content['links']); hide($content['links']['comment']); hide($content['product:field_sale_text']);
  hide($content['product:field_right_side_description']); hide($content['product:field_description']); hide($content['product:field_parameters']);
  ?>
  <div <?php print $attributes; ?>>
    <div <?php print $content_attributes; ?>>
       <!-- Product Content -->
      <div class="row mb-60 mb-xs-30">
        <!-- Product Images -->
        <div class="col-md-4 mb-md-30">
          <?php print render($content['product:field_images']); ?>
        </div>
        <!-- Product Description -->
        <div class="col-sm-8 col-md-5 mb-xs-40">
          <?php print $user_picture; ?>

          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h3 class="mt-0"><?php print $title; ?></h3>
          <?php endif; ?>
          <?php print render($title_suffix); ?>

          <?php if ($display_submitted): ?>
            <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
          <?php endif; ?>

          <hr class="mt-0 mb-30"/>
          
          <div class="row">
            <div class="col-xs-6 lead mt-0 mb-20">
                
            <del class="section-text"><?php print render($content['product:field_old_price']); ?></del>
            <?php print render($content['product:commerce_price']); ?>
        
            </div>
            <div class="col-xs-6 align-right section-text">
              <?php print render($content['field_rating']); ?>
              &nbsp;(<?php print t('!reviews_count',  array('!reviews_count' => format_plural(count($comments_array), '1 review', '@count reviews'))); ?>)
            </div>
          </div>
          
          <hr class="mt-0 mb-30"/> 
          
          <div class="section-text mb-30">
            <?php print render($content['product:field_short_description']); ?>
          </div>
          
          <hr class="mt-0 mb-30"/> 
          
          <div class="mb-30">
            <?php
              hide($content['product:sku']);
              print render($content['field_products']); ?>
          </div>
          
          <hr class="mt-0 mb-30"/> 
          
          <div class="section-text small">
            <?php print render($content['product:sku']); ?>
            <?php print render($content); ?>
          </div>
          
        </div>
        <!-- End Product Description -->
        
        <!-- Features -->
        <div class="col-sm-4 col-md-3 mb-xs-40">
          <?php print render($content['product:field_right_side_description']); ?>
        </div>
      <!-- End Features -->
      </div>
    </div>
  </div>
  <!-- End Product Content -->

  <ul class="nav nav-tabs tpl-tabs animate">
      <li class="active">
          <a href="#one" data-toggle="tab" aria-expanded="true"><?php print t('Description'); ?></a>
      </li>
      <?php if(isset($content['product:field_parameters'])): ?>
      <li class="">
          <a href="#two" data-toggle="tab" aria-expanded="false"><?php print t('Parameters'); ?></a>
      </li>
      <?php endif; ?>
      <li class="">
          <a href="#three" data-toggle="tab" aria-expanded="false"><?php print t('Reviews (@count)', array('@count' => count($comments_array))); ?></a>
      </li>
  </ul>

  <div class="tab-content tpl-tabs-cont">
    <div class="tab-pane fade active in" id="one">
      <?php print render($content['product:field_description']); ?>
    </div>
    <?php if(isset($content['product:field_parameters'])): ?>
      <div class="tab-pane fade" id="two">
          <?php print render($content['product:field_parameters']); ?>
      </div>
    <?php endif; ?>
    <div class="tab-pane fade" id="three">      
      <?php print render($content['comments']); ?>
    </div>
  </div>

  <?php if (!empty($content['links'])): ?>
  <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
  <?php endif; ?>
<?php } ?>