<?php $this->view("minima/include/header", $data); ?>
<section class="section background-white">
    <div class="s-12 m-12 l-4 center">
        <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Upload Image</h4>
        <p class="text-center text-danger" style = "color: red"><?=  isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></p>
        <form class="customform" method="post" enctype="multipart/form-data">
            
            <div class="s-12"> 
                <input name="title" class="subject" placeholder="Your title" title="Caption" type="text" >
                <p class="subject-error form-error">Your title.</p>
            </div>
            <div class="s-12">
                <input type="file" name="image" id="image" class="subject" >
                <p class="subject-error form-error">Image</p>
            </div>
            <div class="s-12">
                <textarea name="description" class="required message" placeholder="Your Description" rows="3"></textarea>
                <p class="message-error form-error">Your Description.</p>
            </div>
            <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit" >Submit</button></div>
        </form>
    </div>           
</section> 
<?php $this->view("minima/include/footer", $data); ?>