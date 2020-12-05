
    <main class="container-fluid">
        

            <h1 class="text-center">Video de <?php echo $ejercicio ?></h1>


        <section class="">  
        <?php foreach($exercises as $exercise) :?>     
        <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item"src="videos/<?php echo $exercise->video ?>" allowfullscreen></iframe>
        </div>
        <?php endforeach; ?>


             
            

        
   
    </section>                                    
    



</main><!-- Main Container-->

