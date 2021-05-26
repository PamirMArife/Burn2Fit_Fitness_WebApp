<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> Burn2Fit - Food </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="https://preview.colorlib.com/theme/fitnessclub/site.webmanifest">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

<link rel="stylesheet" href="assets/css/A.bootstrap.min.css+owl.carousel.min.css+slicknav.css+flaticon.css+gijgo.css+animate.min.css+animated-headline.css+magnific-popup.css+fontawesome-all.min.css+themify-icons.css+slick.css+.css" />
<link rel="stylesheet" href="assets/css/A.style.css.pagespeed.cf.wQc68ImGiy.css">
</head>
<body>

 <div id="preloader-active">
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class="preloader-circle"></div>
<div class="preloader-img pere-text">
<img src="assets/img/logo/loader.png" alt="">
</div>
</div>
</div>
</div>

<?php include_once("parts/header.php"); ?>
<main>

<div class="slider-area2">
<div class="slider-height2 d-flex align-items-center">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="hero-cap hero-cap2 text-center pt-70">
        <form action="#"  method="post">
        <div class="form-group">
    <input type="text" name='food'class="form-control custom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search food">
  </div>
  <button type="submit" name="search" class="btn btn-primary">Search Recipe</button>
    </form>
   
</div>
</div>
</div>
</div>
</div>
</div>
<section class="services-area pt-100 pb-150">
<div class='container'>
   <div class='row'>
<?php
          if(isset($_POST['search']))
            {
              $food = $_POST['food'];
              $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://edamam-recipe-search.p.rapidapi.com/search?q=$food",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: edamam-recipe-search.p.rapidapi.com",
		"x-rapidapi-key: 19bdcc0f55mshb2c8837d3af4431p14a1b7jsn493513cd39c5"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
  $x = 0;
 
  while($x <= 8) {
    $x++;
    $json = json_decode($response, true);
    $image = $json['hits'][$x]['recipe']['image'];
    $label = $json['hits'][$x]['recipe']['label'];
    $ingredientLines = count($json['hits'][$x]['recipe']['ingredientLines'])-1; 
    $calories = $json['hits'][$x]['recipe']['calories'];
    $y = 0;
  

  
   echo " 
<div class='col-md-4'>
 <div class='card' style='width: 32rem;''>
 <img class='card-img-top' src='$image' alt='Card image cap'>
 <div class='card-body'>
    <h4 class='card-title custom_t'>$label</h4>
    <p class='card-text'>total calories : $calories.</p>
  </div>
  <ul class='list-group list-group-flush'>
  ";
 
  while($y < $ingredientLines) {
    $y++;
    
    $ingredientLines1 = $json['hits'][$x]['recipe']['ingredientLines'][strval($y)]; 
    echo"
      
      
      <li class='list-group-item'>$ingredientLines1</li>
      
   ";

}
echo "</ul></div>
</div>";
} }
            }
    ?>
    </div>
</div>
</section>

<?php include_once("parts/footer.php"); ?>
</body>
</html>
<style>
.custom
{
  height: 40px;
    font-size: 20px;
    color: black;
}
.custom_t
{
  font-family: auto;
    color: #2c234d;
    margin-top: 0;
    font-style: normal;
    font-weight: 500;
    text-transform: normal;
    font-size:20px;
}
</style>