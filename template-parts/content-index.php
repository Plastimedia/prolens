<div class="head-image">

  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slider Escritorio')): ?>

  <?php endif; ?>

  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slider Celular')): ?>

  <?php endif; ?>

</div>
<section class="nuestros-productos ">
  <div class="ancho">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Nuestros productos')): ?>
      <?php endif; ?>
    </div>
    <div class="grid-categorias">
    <?php
    $categories = get_categories(
      array(
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => false,
        'number' => 6
      )
    );
    foreach ($categories as $category) {
      // echo '<img src="' .woocommerce_subcategory_thumbnail($category)  . '"><div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';   
      ?>
      <div class="category">
          <div class="content">
            <img src="<?php
            $cid = get_term_meta($category->term_id, 'thumbnail_id', true);
            $laim = wp_get_attachment_image_src($cid, 'full');
            echo $laim[0];
            ?>" alt="<?php echo $category->name ?>" width="200" height="125">
            <p><?php echo $category->name ?></p>
            <a href="<?php echo get_category_link($category->term_id) ?>">Ver más</a>
          </div>
      </div>
      <?php
      }
      ?>
    </div>

  </div>

</section>
<!-- SOBRE PROLENS -->
<section class="sobre-prolens">
  <div class="ancho">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sobre Prolens')): ?>
      <?php endif; ?>
    </div>
    <div class="content">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sobre prolens info')): ?>
      <?php endif; ?>
    </div>
  </div>
</section>
 <!-- SOBRE PROLENS -->
<section>
 <!-- CARACTERISITCAS PROLENS -->
  <div class="caracteristicas-prolens">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Caracteristicas')): ?>
        <?php endif; ?>
      </div>
    </div>
  <!-- CARACTERISTICAS PROLENS -->
</section>
<section class="destacados">
  <!-- PRODUCTOS DESTACADOS -->
  <div class="productos-destacados">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Productos destacados')): ?>
        <?php endif; ?>
      </div>
      <div class="grid-categorias">
        <?php
        $categories = get_categories(
          array(
            'taxonomy' => 'product_cat',
            'parent' => 0,
            'hide_empty' => false,
            'number' => 6
          )
        );
        foreach ($categories as $category) {
          // echo '<img src="' .woocommerce_subcategory_thumbnail($category)  . '"><div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';   
          ?>
          <div class="category">
            <a href="<?php echo get_category_link($category->term_id) ?>">
              <?php echo $category->name ?>
            </a>
          </div>
          <?php
          }
          ?>
      </div>
      <!-- PRODUCTOS DESTACADOS -->
      <?php
      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 6,
        'tax_query'      => array(
          array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured'
          )
        )
      );
      $featured_query = new WP_Query($args);

      if ($featured_query->have_posts()) :
      ?>
        <div class="splide slider-destacados" id="productos-destacados">
          <div class="splide__track">
            <ul class="splide__list">
              <?php while ($featured_query->have_posts()) : $featured_query->the_post(); global $product; ?>
                <li class="splide__slide">
                  <a href="<?php the_permalink(); ?>">
                    <?php woocommerce_show_product_sale_flash(); ?>
                    <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('medium');
                    } ?>
                    <h3><?php the_title(); ?></h3>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                  </a>
                </li>
              <?php endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>
      <?php endif; ?>      

  </div>
  <!-- PRODUCTOS DESTACADOS -->      
    </div>
  </div>  
</section>
<section class="recientes">
  <!-- PRODUCTOS NUEVOS -->
  <div class="productos-nuevos">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Productos nuevos')): ?>
        <?php endif; ?>
      </div>
<div class="splide" id="slider-recientes">
    <div class="splide__track">
      <ul class="splide__list">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 10, // cantidad de productos
          'orderby' => 'date',
          'order' => 'DESC'
        );
        $recent_products = new WP_Query($args);

        if ($recent_products->have_posts()) :
          while ($recent_products->have_posts()) : $recent_products->the_post();
            global $product;
            ?>
            <li class="splide__slide">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('medium');
                } ?>
                <h3><?php the_title(); ?></h3>
                <span class="price"><?php echo $product->get_price_html(); ?></span>
              </a>
            </li>
            <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<li>No hay productos recientes</li>';
        endif;
        ?>
      </ul>
    </div>
  </div>      
    </div>
  <!-- PRODUCTOS NUEVOS -->
</section>
<section class="blog">
  <!-- BLOGS -->
  <div class="blogs">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blogs')): ?>
        <?php endif; ?>
      </div>
<div class="splide" id="blogs">
    <div class="splide__track">
      <ul class="splide__list">
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'DESC'
        );
        $recent_posts = new WP_Query($args);
        if ($recent_posts->have_posts()) :
          while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
            <div class="blog-post">
            <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" 
                     alt="<?php echo esc_attr(get_the_title()); ?>" 
                     width="200" height="125">
              <?php endif; ?>
              <div class="content-text">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
              <p class="date"><?php echo get_the_date(); ?></p>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        else : ?>
          <p><?php _e('No recent posts found.'); ?></p>
        <?php endif; ?>
      </ul>
    </div>
  </div> 

    </div>
  <!-- BLOGS -->
</section>
<section class="metodos-pagos">
     <!--METODOS DE PAGO -->
  <div class="metodos-pago">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Metodos de pago')): ?>
        <?php endif; ?>
      </div>
      <div class="splide content-bancos" id="slider-bancos">
          <div class="splide__track">
            <ul class="splide__list">
              <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bancos')): ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>  
    </div>
  </div>
</section>

  <!-- METODOS DE PAGO -->
   <script>
  document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#productos-destacados', {
      type   : 'loop',
      perPage: 4,
      perMove: 1,
      autoplay: true,
      gap: '10px',
      breakpoints: {
        768: { perPage: 1 }
      }
    }).mount();
  });
  document.addEventListener('DOMContentLoaded', function () {
  new Splide('#slider-recientes', {
    type   : 'loop',
    perPage: 4,
    gap    : '10px',
    autoplay: true,
    breakpoints: {
      768: { perPage: 2 },
      480: { perPage: 1 }
    }
  }).mount();
});
  document.addEventListener('DOMContentLoaded', function () {
  new Splide('#blogs', {
    type   : 'loop',
    perPage: 3,
    gap    : '10px',
    autoplay: true,
    breakpoints: {
      768: { perPage: 2 },
      480: { perPage: 1 }
    }
  }).mount();
});
document.addEventListener('DOMContentLoaded', function () {
  new Splide('#slider-bancos', {
    type   : 'loop',
    perPage: 4,
    gap    : '10px',
    autoplay: true,
    breakpoints: {
      768: { perPage: 2 },
      480: { perPage: 1 }
    }
  }).mount();
});
</script>
