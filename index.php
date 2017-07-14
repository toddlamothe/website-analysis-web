<?php
session_start();
require('app/templates/process-submission-form.php');
?>
<html>
 <head>
  <title>Competitive Analysis</title>
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
 </head>
 <body>
   <form class="form-horizontal" method="post" action="#">
     <div class="row">
       <div class="col-md-3 col-sm-3"></div>
       <div class="col-md-6 col-sm-6">
         <div class="page-header">
           <img src="./app/assets/images/e_EZbgLD.jpg" width="50px" height="50px" style="float: left;" />
           <h1>&nbsp;Competitive Analysis</h1>
         </div>
       </div>
       <div class="col-md-3 col-sm-3"></div>
     </div>
     <div class="row">
       <div class="col-md-3 col-sm-3"></div>
       <div class="col-md-6 col-sm-6">
         <div class="form-group">
           <label for="url" class="col-sm-3 control-label">Your Url</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="url" name="url" placeholder="yourwebsite.com" value="<?php echo($yourUrl); ?>">
           </div>
         </div>
       </div>
       <div class="col-md-3 col-sm-3"></div>
     </div>

     <div class="row">
       <div class="col-md-2 col-sm-2"></div>
       <div class="col-md-2 col-sm-2">
         <div class="form-group">
           <div class="col-sm-12">
             <input type="text" class="form-control" id="competitor1url" name="competitor1url" placeholder="competitor1.com" value="<?php echo($competitor1url); ?>">
           </div>
         </div>
       </div>
       <div class="col-md-1 col-sm-1">vs</div>
       <div class="col-md-2 col-sm-2">
         <div class="form-group">
           <div class="col-sm-12">
             <input type="text" class="form-control" id="competitor2url" name="competitor2url" placeholder="competitor2.com" value="<?php echo($competitor2url); ?>">
           </div>
         </div>
       </div>
       <div class="col-md-1 col-sm-1">vs</div>
       <div class="col-md-2 col-sm-2">
         <div class="form-group">
           <div class="col-sm-12">
             <input type="text" class="form-control" id="competitor3url" name="competitor3url" placeholder="competitor3.com" value="<?php echo($competitor3url); ?>">
           </div>
         </div>

       </div>
       <div class="col-md-1 col-sm-1">
         <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-default pull-right">Run</button>
           </div>
         </div>
       </div>
       <div class="col-md-1 col-sm-1"></div>
     </div>
   </form>
  <?php
  if ($isPostBack) {
  ?>

  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <h3>SEO Comparison</h3>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>

  <div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
       <table class="table table-striped">
         <tr>
           <th>Domain</th>
           <th>Organic Keywords</th>
           <th>Organic clicks/mo</th>
           <th>Daily Organic Traffic Value</th>
         </tr>
<?php foreach($resultSets as $analyticsResultSet) {  ?>
         <tr>
           <td><?php echo($analyticsResultSet->url); ?></td>
           <td><?php echo($analyticsResultSet->num_organic_keywords); ?></td>
           <td><?php echo($analyticsResultSet->organic_clicks_per_month); ?></td>
           <td><?php echo($analyticsResultSet->daily_organic_traffic_value); ?></td>
         </tr>
<?php } ?>
       </table>
   </div>
   <div class="col-md-1"></div>
 </div>
 <div class="row">
   <div class="col-md-1 col-sm-1"></div>
   <div class="col-md-10 col-sm-10">
     <h3>PPC Comparison</h3>
   </div>
   <div class="col-md-1 col-sm-1"></div>
 </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-striped">
          <tr>
            <th>Domain</th>
            <th>Paid keywords</th>
            <th>Paid click/mo</th>
            <th>Daily Adwords Budget</th>
            <th>Monthly Adwords Budget</th>
          </tr>
    <?php foreach($resultSets as $analyticsResultSet) {  ?>
          <tr>
            <td><?php echo($analyticsResultSet->url); ?></td>
            <td><?php echo($analyticsResultSet->num_paid_keywords); ?></td>
            <td><?php echo($analyticsResultSet->paid_clicks_per_month); ?></td>
            <td><?php echo($analyticsResultSet->daily_adwords_budget); ?></td>
            <td><?php echo($analyticsResultSet->monthly_adwords_budget); ?></td>
          </tr>
    <?php } ?>
        </table>
    </div>
    <div class="col-md-1"></div>
  </div>

   <div class="row">
     <div class="col-md-1 col-sm-1"></div>
     <div class="col-md-10 col-sm-10">
       <h3>Market Competitors</h3>
     </div>
     <div class="col-md-1 col-sm-1"></div>
   </div>

    <div class="row">
      <div class="col-md-1 col-sm-1"></div>
      <div class="col-md-5 col-sm-5">Top Organic Competitors</div>
      <div class="col-md-5 col-sm-5">Top Paid Competitors</div>
      <div class="col-md-1 col-sm-1"></div>
    </div>

     <div class="row">
       <div class="col-md-1 col-sm-1"></div>
       <div class="col-md-5 col-sm-5">
         <table class="table table-striped">
           <tr>
             <th>Domain Name</th>
             <th>Overlap</th>
             <th>Common Keywords</th>
           </tr>
  <?php foreach($topOrganicCompetitors as $organicCompetitor) {  ?>
    <?php //var_dump($organicCompetitor); ?>
           <tr>
             <td><?php echo($organicCompetitor->domainName); ?></td>
             <td><?php echo($organicCompetitor->overlap); ?></td>
             <td><?php echo($organicCompetitor->commonKeywords); ?></td>
           </tr>
  <?php } ?>
         </table>
       </div>
       <div class="col-md-5 col-sm-5">
         <table class="table table-striped">
           <tr>
             <th>Domain Name</th>
             <th>Overlap</th>
             <th>Common Keywords</th>
           </tr>
  <?php foreach($topPaidCompetitors as $paidCompetitor) {  ?>
    <?php //var_dump($organicCompetitor); ?>
           <tr>
             <td><?php echo($paidCompetitor->domainName); ?></td>
             <td><?php echo($paidCompetitor->overlap); ?></td>
             <td><?php echo($paidCompetitor->commonKeywords); ?></td>
           </tr>
  <?php } ?>
         </table>
       </div>
       <div class="col-md-1 col-sm-1"></div>
     </div>


 <?php } ?>
  <script src="./vendor/components/jquery/jquery.min.js"></script>
  <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
 </body>
</html>
