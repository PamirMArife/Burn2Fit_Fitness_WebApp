<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> Burn2Fit - BMI </title>
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
    <input type="text" name='bmi'class="form-control custom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Bmi">
  </div>
  <button type="submit" name="search" class="btn btn-primary">Search Bmi</button>
    </form>
   
</div>
</div>
</div>
</div>
</div>
</div>
<section class="services-area pt-100 pb-150">
<?php 
if(isset($_POST['search']))
{
  $bmi = $_POST['bmi'];
  $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://body-mass-index-bmi-calculator.p.rapidapi.com/weight-category?bmi=$bmi",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: body-mass-index-bmi-calculator.p.rapidapi.com",
		"x-rapidapi-key: 19bdcc0f55mshb2c8837d3af4431p14a1b7jsn493513cd39c5"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    @$json = json_decode($response, true);
    $bmi = $json['bmi'];
    $weightCategory = $json['weightCategory'];
    $ObeseClass = $json['ObeseClass'];
echo "
<div class='container'>
<table class='table'>
  <thead>
    <tr class='tr_custom'>
      <th scope='col'>bmi</th>
      <th scope='col'>weightCategory</th>
      <th scope='col'>ObeseClass</th>
    </tr>
  </thead>
  <tbody>
    <tr class='tr_custom'>
      <td>$bmi</td>
      <td>$weightCategory</td>
      <td>$ObeseClass</td>
    </tr>
  </tbody>
</table>
</div>
";
}

}
?>

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
.tr_custom
{
    font-size: 15px;
    font-family: inherit;
}
</style>