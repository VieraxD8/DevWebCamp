<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>


<div class="bloques" >

    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Registros</h3>

            <?php foreach($registros as $registro) { ?>

                <div class="bloque__contenido">
                    <div class="bloque__texto">
                        <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                    </div>
                </div>

                <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>

            <p class="bloque__texto--cantidad">$ <?php echo $ingresos; ?></p>
        </div>


        <div class="bloque">
            <h3 class="bloque__heading">Eventos con Menos lugares Disponibles</h3>
                <?php foreach($menos_disponible as $evento) {  ?>
                    
                    <div class="bloque__contenido">
                        <div class="bloque__texto">
                            <?php echo $evento->nombre . " " . $evento->disponibles . 'Disponibles'; ?>
                        </div>
                
                    </div>

                    
                <?php } ?>
        </div>


        
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con Mas lugares Disponibles</h3>
                <?php foreach($mas_disponible as $evento) {  ?>
                    
                    <div class="bloque__contenido">
                        <div class="bloque__texto">
                            <?php echo $evento->nombre . " " . $evento->disponibles . 'Disponibles'; ?>
                        </div>
                
                    </div>

                    
                <?php } ?>
        </div>


    </div>

</div> 


