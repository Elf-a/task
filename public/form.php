<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sortable Tabular Data</title>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>

<script src="js/main.js"></script>
<link rel="stylesheet" href="css/main.css">

</head>

<body>

<div id="registration-form">
  <div class='fieldset'>
    <legend>Формуляр за създаване на кредит</legend>
    <form action="#" method="post" data-validate="parsley">
      <div class='row'>
        <label for='firstname'>Име:</label>
        <input type="text" placeholder="Име" name='firstname' id='firstname' data-required="true" data-error-message="Your Name is required">
      </div>
      <div class='row'>
        <label for="email">Сума на кредита:</label>
        <input type="text" placeholder="Сума"  name='email' data-required="true" data-type="email" data-error-message="Amount is required">
      </div>
      <div class='row'>
        <label for="cemail">Период на кредита:</label>
        <input type="text" placeholder="Период в месеци" name='cemail' data-required="true" data-error-message="Your credit period is required">
      </div>
      <input type="submit" value="СЪЗДАЙ">
    </form>
  </div>
</div>


<input type="button" class="cta-open-form" value="Създаване на нов кредит" />
<input type="button" class="cta-open-form" value="Ново плащане по кредит" />

 <div id="wrapper">
  <h1>Списък на кредити</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Name</span></th>
        <th><span>Credit amount</span></th>
        <th><span>Period in months</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="lalign">Ivan Takov</td>
        <td>18,000</td>
        <td>60</td>
      </tr>
    </tbody>
  </table>
 </div> 
</body>