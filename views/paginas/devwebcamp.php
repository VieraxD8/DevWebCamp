<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamerica</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?>  class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="imagen devwebcamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p  <?php aos_animacion(); ?> class="devwebcamp__texto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, iure architecto fugiat neque eligendi maxime voluptatem tempore. Deleniti maxime ad tempora, iste quod facilis corrupti repellat provident accusantium vero ex?</p>

            <p  <?php aos_animacion(); ?> class="devwebcamp__texto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, iure architecto fugiat neque eligendi maxime voluptatem tempore. Deleniti maxime ad tempora, iste quod facilis corrupti repellat provident accusantium vero ex?</p>
        </div>
    </div>
</main>