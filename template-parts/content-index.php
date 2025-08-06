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
        <a href="<?php echo get_category_link($category->term_id) ?>">
          <div class="content">
            <img src="<?php
            $cid = get_term_meta($category->term_id, 'thumbnail_id', true);
            $laim = wp_get_attachment_image_src($cid, 'full');
            echo $laim[0];
            ?>" alt="<?php echo $category->name ?>" width="200" height="125">
            <p><?php echo $category->name ?></p>
            <a href="#">Ver más</a>
          </div>
        </a>
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
<section>
  <!-- PRODUCTOS DESTACADOS -->
  <div class="productos-destacados">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Productos destacados')): ?>
        <?php endif; ?>
      </div>
    </div>
  <!-- PRODUCTOS DESTACADOS -->
</section>
<section>
  <!-- PRODUCTOS NUEVOS -->
  <div class="productos-nuevos">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Productos nuevos')): ?>
        <?php endif; ?>
      </div>
    </div>
  <!-- PRODUCTOS NUEVOS -->
</section>
<section>
  <!-- BLOGS -->
  <div class="blogs">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blogs')): ?>
        <?php endif; ?>
      </div>
    </div>
  <!-- BLOGS -->
</section>
<section>
     <!--METODOS DE PAGO -->
  <div class="metodos-pago">
    <div class="ancho">
      <div class="info">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Metodos de pago')): ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

  <!-- METODOS DE PAGO -->