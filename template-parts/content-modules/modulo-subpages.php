<?php if( have_rows('sotto_pagine') ) : ?>
  <div class="sottopagine">
     <?php
     $count_sub = 0;
     while ( have_rows('sotto_pagine') ) : the_row();
     $page_image = get_sub_field('page_image');
       if ( $isMobile == 1 ) {
         $page_image_URL = $page_image['sizes']['grid_picture'];
       }
       if ( $isTablet == 1 ) {
         $page_image_URL = $page_image['sizes']['grid_picture'];
       }
       if ( $isDesktop == 1 ) {
         $page_image_URL = $page_image['sizes']['grid_picture'];
       }
     $count_sub ++; ?>
     <?php if ($count_sub % 2 != 0) : ?>
       <div class="sub-page">
         <?php if ( $page_image_URL != '' ) : ?>
           <div class="split">
             <a href="<?php the_sub_field('scegli_pagina'); ?>">
               <img class="lazy" data-original="<?php echo $page_image_URL; ?>" />
             </a>
           </div>
           <div class="split">
             <div class="padder_r content-styled">
               <h4><a href="<?php the_sub_field('scegli_pagina'); ?>"><?php the_sub_field('page_title'); ?></a></h4>
               <div class="only-desktop">
                 <?php the_sub_field('page_abstract'); ?>
                 <a href="<?php the_sub_field('scegli_pagina'); ?>" class="btn-fill red cta-4 allupper"><?php the_sub_field('page_cta'); ?></a>
                 <?php if( get_sub_field('page_cta_2') ) : ?>
                   <?php
                   $page_cta_2_appearence = get_sub_field( 'page_cta_2_appearence' );
                   if ( $page_cta_2_appearence === 'primary-cta' ) {
                     $cta_style = 'btn-fill red cta-4 allupper';
                   }
                   else {
                     $cta_style = 'btn-fill-hover grey cta-4 allupper last';
                   }
                   if ( get_sub_field('page_cta_2') ) {
                     $page_cta_2_link = get_sub_field('page_cta_2_link');
                     if ( $page_cta_2_link === 'page-cta-2-file' ) {
                       $cta2_link = get_sub_field('cta_2_file');
                       $cta2_target = "_blank";
                     }
                     else {
                       $cta2_link = get_sub_field('cta_2_url');
                       $cta2_target = "_self";
                     }
                   }
                    ?>
                    <?php if ( get_sub_field('page_cta_2') ) : ?>
                      <a href="<?php echo $cta2_link; ?>" target="<?php echo $cta2_target; ?>" class="<?php echo $cta_style; ?>"><?php the_sub_field('page_cta_2'); ?></a>
                    <?php endif; ?>
                 <?php endif; ?>
               </div>

             </div>
         <?php else : ?>
           <div class="split-full">
             <div class="padder_r content-styled">
               <h4><a href="<?php the_sub_field('scegli_pagina'); ?>"><?php the_sub_field('page_title'); ?></a></h4>
               <div class="only-desktop">
                 <?php the_sub_field('page_abstract'); ?>
                 <a href="<?php the_sub_field('scegli_pagina'); ?>" class="btn-fill red cta-4 allupper"><?php the_sub_field('page_cta'); ?></a>
                 <?php if( get_sub_field('page_cta_2') ) : ?>
                   <?php
                   $page_cta_2_appearence = get_sub_field( 'page_cta_2_appearence' );
                   if ( $page_cta_2_appearence === 'primary-cta' ) {
                     $cta_style = 'btn-fill red cta-4 allupper';
                   }
                   else {
                     $cta_style = 'btn-fill-hover grey cta-4 allupper last';
                   }
                   if ( get_sub_field('page_cta_2') ) {
                     $page_cta_2_link = get_sub_field('page_cta_2_link');
                     if ( $page_cta_2_link === 'page-cta-2-file' ) {
                       $cta2_link = get_sub_field('cta_2_file');
                       $cta2_target = "_blank";
                     }
                     else {
                       $cta2_link = get_sub_field('cta_2_url');
                       $cta2_target = "_self";
                     }
                   }

                    ?>
                    <?php if ( get_sub_field('page_cta_2') ) : ?>
                      <a href="<?php echo $cta2_link; ?>" target="<?php echo $cta2_target; ?>" class="<?php echo $cta_style; ?>"><?php the_sub_field('page_cta_2'); ?></a>
                    <?php endif; ?>
                 <?php endif; ?>
               </div>
             </div>
         <?php endif; ?>

         </div>
       </div>
     <?php else : ?>
       <div class="sub-page">
         <?php if ( $page_image_URL != '' ) : ?>
           <div class="split">
             <div class="padder_l content-styled">
               <h4><a href="<?php the_sub_field('scegli_pagina'); ?>"><?php the_sub_field('page_title'); ?></a></h4>
               <div class="only-desktop">
                 <?php the_sub_field('page_abstract'); ?>
                 <a href="<?php the_sub_field('scegli_pagina'); ?>" class="btn-fill red cta-4 allupper"><?php the_sub_field('page_cta'); ?></a>
                 <?php if( get_sub_field('page_cta_2') ) : ?>
                   <?php
                   $page_cta_2_appearence = get_sub_field( 'page_cta_2_appearence' );
                   if ( $page_cta_2_appearence === 'primary-cta' ) {
                     $cta_style = 'btn-fill red cta-4 allupper';
                   }
                   else {
                     $cta_style = 'btn-fill-hover grey cta-4 allupper last';
                   }
                   if ( get_sub_field('page_cta_2') ) {
                     $page_cta_2_link = get_sub_field('page_cta_2_link');
                     if ( $page_cta_2_link === 'page-cta-2-file' ) {
                       $cta2_link = get_sub_field('cta_2_file');
                       $cta2_target = "_blank";
                     }
                     else {
                       $cta2_link = get_sub_field('cta_2_url');
                       $cta2_target = "_self";
                     }
                   }
                    ?>
                    <?php if ( get_sub_field('page_cta_2') ) : ?>
                      <a href="<?php echo $cta2_link; ?>" target="<?php echo $cta2_target; ?>" class="<?php echo $cta_style; ?>"><?php the_sub_field('page_cta_2'); ?></a>
                    <?php endif; ?>
                 <?php endif; ?>
               </div>
             </div>
           </div>
           <div class="split">
             <a href="<?php the_sub_field('scegli_pagina'); ?>">
               <img class="lazy" data-original="<?php echo $page_image_URL; ?>" />
             </a>
           </div>
         <?php else : ?>
           <div class="split-full">
             <div class="padder_l content-styled">
               <h4><a href="<?php the_sub_field('scegli_pagina'); ?>"><?php the_sub_field('page_title'); ?></a></h4>
               <div class="only-desktop">
                 <?php the_sub_field('page_abstract'); ?>
                 <a href="<?php the_sub_field('scegli_pagina'); ?>" class="btn-fill red cta-4 allupper"><?php the_sub_field('page_cta'); ?></a>
                 <?php if( get_sub_field('page_cta_2') ) : ?>
                   <?php
                   $page_cta_2_appearence = get_sub_field( 'page_cta_2_appearence' );
                   if ( $page_cta_2_appearence === 'primary-cta' ) {
                     $cta_style = 'btn-fill red cta-4 allupper';
                   }
                   else {
                     $cta_style = 'btn-fill-hover grey cta-4 allupper last';
                   }
                   if ( get_sub_field('page_cta_2') ) {
                     $page_cta_2_link = get_sub_field('page_cta_2_link');
                     if ( $page_cta_2_link === 'page-cta-2-file' ) {
                       $cta2_link = get_sub_field('cta_2_file');
                       $cta2_target = "_blank";
                     }
                     else {
                       $cta2_link = get_sub_field('cta_2_url');
                       $cta2_target = "_self";
                     }
                   }
                    ?>
                    <?php if ( get_sub_field('page_cta_2') ) : ?>
                      <a href="<?php echo $cta2_link; ?>" target="<?php echo $cta2_target; ?>" class="<?php echo $cta_style; ?>"><?php the_sub_field('page_cta_2'); ?></a>
                    <?php endif; ?>
                 <?php endif; ?>
               </div>
             </div>
           </div>
         <?php endif; ?>

       </div>
     <?php endif; ?>
     <div class="only-mobile">
       <div class="split-full">
         <?php the_sub_field('page_abstract'); ?>
         <a href="<?php the_sub_field('scegli_pagina'); ?>" class="btn-fill red cta-4 allupper"><?php the_sub_field('page_cta'); ?></a>
         <?php if( get_sub_field('page_cta_2') ) : ?>
           <?php
           $page_cta_2_appearence = get_sub_field( 'page_cta_2_appearence' );
           if ( $page_cta_2_appearence === 'primary-cta' ) {
             $cta_style = 'btn-fill red cta-4 allupper';
           }
           else {
             $cta_style = 'btn-fill-hover grey cta-4 allupper last';
           }
           if ( get_sub_field('page_cta_2') ) {
             $page_cta_2_link = get_sub_field('page_cta_2_link');
             if ( $page_cta_2_link === 'page-cta-2-file' ) {
               $cta2_link = get_sub_field('cta_2_file');
               $cta2_target = "_blank";
             }
             else {
               $cta2_link = get_sub_field('cta_2_url');
               $cta2_target = "_self";
             }
           }
            ?>
            <?php if ( get_sub_field('page_cta_2') ) : ?>
              <a href="<?php echo $cta2_link; ?>" target="<?php echo $cta2_target; ?>" class="<?php echo $cta_style; ?>"><?php the_sub_field('page_cta_2'); ?></a>
            <?php endif; ?>
         <?php endif; ?>
       </div>
     </div>
     <div class="mobile-pages-separator"></div>
<?php endwhile; ?>
  </div>
<?php endif; ?>
