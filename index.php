

<script src="js/bg.js"></script>

<?php 
include_once 'header.php'
?>

<?php
if(isset($_SESSION["userid"])){
    echo "<p class='msg'>Hello there " . $_SESSION["useruid"] ." </p>";
}
?>

   <div class="imgr">
       <h21 class="retro">Retro Bistrot</h21>
</div>
<!-- <img src="123.jpg" alt=""> -->

<section>
    <div class="wrapper-grid1">
        <div class="container-grid1">
            <h1 class="name1">
                Our Story
            </h1>
            <p class="description1">
                The History of Kitchens and Cooks gives further intimation 
            on Mr Boulanger usual menu, stating confidently that "Boulanger served 
            salted poultry and fresh eggs, all presented without a tablecloth on small 
            marble tables". Numerous commentators have also referred to the supposed 
            restaurant owner's eccentric habit of touting for custom outside his 
            establishment, dressed in aristocratic fashion and brandishing a sword
            Numerous commentators have also referred to the supposed restaurant 
            owner's eccentric habit of touting for custom outside his establishment,
             dressed in aristocratic fashion and brandishing a sword.
            </p>
            
    </div>

    <div class="container-grid1">
        <div class="img">
            <img src="./images/04.jpg" height="420px">
        </div>
</div>

<div class="container-grid1">
    <div class="img1">
        <img src="./images/05.jpg" height="405px">
    </div>
    
</div>

<div class="container-grid1">
    
    <h1 class="name1">
        Our Restaurant
    </h1>
    <p class="description1">
        The History of Kitchens and Cooks gives further intimation 
            on Mr Boulanger usual menu, stating confidently that "Boulanger served 
            salted poultry and fresh eggs, all presented without a tablecloth on small 
            marble tables". Numerous commentators have also referred to the supposed 
            restaurant owner's eccentric habit of touting for custom outside his 
            establishment, dressed in aristocratic fashion and brandishing a sword
            Numerous commentators have also referred to the supposed restaurant 
            owner's eccentric habit of touting for custom outside his establishment,
             dressed in aristocratic fashion and brandishing a sword.
    </p>
</div>
</section>

<br>

<section>
    <div class="wrapper-grid2">
        <div class="container-grid2">
            <h1 class="our-story">
                Gallery
            </h1>
    </div>
</div>
</section>



<br>
<section>
    <div class="container1">
        <div class="gallery">
            <figure class="gallery__item gallery__item--1">
                <img src="img/21.png" alt="Gallery image 1" class="gallery__img">
            </figure>
            <figure class="gallery__item gallery__item--2">
                <img src="img/22.png" alt="Gallery image 2" class="gallery__img">
            </figure>
            <figure class="gallery__item gallery__item--3">
                <img src="img/23.png" alt="Gallery image 3" class="gallery__img">
            </figure>
            <figure class="gallery__item gallery__item--4">
                <img src="img/24.png" alt="Gallery image 4" class="gallery__img">
            </figure>
            <figure class="gallery__item gallery__item--5">
                <img src="img/25.png" alt="Gallery image 5" class="gallery__img">
            </figure>
            <figure class="gallery__item gallery__item--6">
                <img src="img/33.jpg" alt="Gallery image 6" class="gallery__img">
            </figure>
        </div>
    </div>
</section>



<section>
    <div class="wrapper-grid2">
        <div class="container-grid2">
            <h1 class="our-story">
                Book a Table
            </h1>
    </div>
</div>
</section>


<section>
    <div class="wrapper">
        <img src="./images/form.svg"  class="imgtable">
		<section class="main">
			<h9 style="color: aliceblue;">Booking details</h9>
			<form name="travelForm" id="travelForm" action="#" method="post" enctype="application/x-www-form-urlencoded">
				<div class = "clearfix">
                    <div class="formBox" style="color: aliceblue;width: 250px;">
                        <label for="nameform">
                         Name</label>


                        <input type="text" name="departure" id="departure" placeholder="John" required/>
                    </div>
                    <div class="formBox" style="color: aliceblue; width: 250px;">
                        <label for="destination">
                         E-mail</label>
                        <input type="text" name="destination" id="destination" placeholder="example@.com" required/>
                    </div>

                    <div class="formBox" style="color: aliceblue; width: 250px;" >
                        <label for="departure_dt"> Date</label>
                        <input type="date" name="departure_dt" id="departure_dt"  required/>
                    </div>
                   




                <div class="col" style="color: aliceblue; width: 250px;">
					<label for="num_adults">Number</label>
                    <input type="number" placeholder="1,2,3">
		
					
				</div>
				
                  

				<div class="btn-flex">
				<div class=" col buttons">
					<input type="reset" name="btnReset" id="btnReset" value="Reset"  />
                    </div>
                    <div class=" col buttons">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
				 </div>
                 </div>

        </div> 
			</form>
		</section>
	</div>
</section>



<br>
<br>


<?php 
include_once 'footer.php'
?>
