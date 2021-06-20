<?php $this->view("minima/include/header", $data); ?>
<section class="section background-white">
    <div class="s-12 m-12 l-4 center ">
        <h4 class="text-size-20 margin-bottom-20 text-dark text-center fw-bold "><?= $data['posts'][0]->title ?></h4>
        <img class="full-img" src="<?= ROOT . $data['posts'][0]->image_path ?>" alt="image" >
        <br>
        <?= $data['posts'][0]->description?>
    </div>           
</section> 
<?php $this->view("minima/include/footer", $data); ?>