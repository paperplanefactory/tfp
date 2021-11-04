<?php if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row(); ?>
  <?php if( have_rows('dates') ) : while ( have_rows('dates') ) : the_row();
  $schema_date = get_sub_field('date');
  $schema_date = strtotime(str_replace("/", "-", $schema_date));
  $schema_date = date("Y-m-d",$schema_date);
  $abstract = get_field('abstract');
  $abstract = strip_tags($abstract);
  if ( get_sub_field('thumb') ) {
    $immagine_singola = get_sub_field('thumb');
    $immagine_singola_URL = $immagine_singola['sizes']['full_desk'];
  }
  else {
    $immagine_singola_URL = $thumb_url[0];
  }
  ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "<?php the_title(); ?>",
      "startDate": "<?php echo $schema_date; ?>T<?php the_sub_field('time'); ?>",
      "location": {
        "@type": "Place",
        "name": "Teatro Franco Parenti",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Via Pier Lombardo, 14",
          "addressLocality": "Milano",
          "postalCode": "20135",
          "addressCountry": "IT"
        }
      },
      "offers": {
        "@type": "Offer",
        "url": "<?php the_field('url_cta_biglietti'); ?>"
      },
      "image": "<?php echo $immagine_singola_URL; ?>",
      "description": "<?php echo $abstract; ?>",
      "endDate": "<?php echo $schema_date; ?>T<?php the_sub_field('time'); ?>"
    }
    </script>
  <?php endwhile; endif; ?>
<?php endwhile; endif; ?>
