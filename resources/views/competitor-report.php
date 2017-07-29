<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Competitive Analysis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
<div id="root" class="container-fluid">


    <form class="form-horizontal" method="post" action="#">
        <div class="row">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <div class="page-header">
                    <img src="/assets/images/e_EZbgLD.jpg" width="50px" height="50px" style="float: left;" />
                    <h1>&nbsp;Competitive Analysis</h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="url" class="control-label">Your Url</label>
                        <input type="text" v-model="url" class="form-control" id="url" name="url" placeholder="yourwebsite.com" >
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3" v-if="url.length > 1">
                <a class="bootstrap-link" v-on:click="showCompetitorPage">Competitor Report</a>
                <span> | </span>
                <a class="bootstrap-link" v-on:click="showIndividualPage">Individual Report</a>
            </div>
        </div>
        <div class="row" v-if="state === 'competitor'">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" v-model="competitor1url" class="form-control" id="competitor1url" name="competitor1url" placeholder="competitor1.com">
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-1">vs</div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" v-model="competitor2url" class="form-control" id="competitor2url" name="competitor2url" placeholder="competitor2.com">
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-1">vs</div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" v-model="competitor3url" class="form-control" id="competitor3url" name="competitor3url" placeholder="competitor3.com">
                    </div>
                </div>

            </div>
            <div class="col-md-1 col-sm-1">

            </div>
            <div class="col-md-1 col-sm-1"></div>
        </div>
        <div class="row" v-if="state === 'competitor' || state == 'individual'">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8">
                <button type="button" v-on:click.prevent="run" class="btn btn-success btn-block">Run</button>
            </div>
            <div class="col-md-2 col-sm-2"></div>
        </div>
    </form>

    <div id="individual-report" v-if="state === 'individual' && individual.analytics.length > 0 ">
        <div id="individual-ceo-performance">
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <h3>SEO Performance</h3>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <span>Active for: FILL</span>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-striped">
                        <tr>
                            <th>Organic Keywords</th>
                            <th>Monthly SEO Clicks</th>
                            <th>Monthly SEO Click Value</th>
                            <th>Sum Of Rank Change</th>
                        </tr>
                        <tr v-for="val in individual.analytics">
                            <td>{{ val.num_organic_keywords }}</td>
                            <td>{{ val.organic_clicks_per_month }}</td>
                            <td>FILL</td>
                            <td>FILL</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="col-md-6" style="padding-left: 0px;">
                    <div class="col-md-12 col-sm-12" style="padding-left: 0px;">
                        <h3>Keyword Placement</h3>
                    </div>
                    <div class="col-md-12"  style="padding: 0px;">
                        <table class="table table-striped">
                            <tr>
                                <th>Page 1</th>
                                <th>Almost There</th>
                                <th>Page 2 To 5</th>
                                <th>Just Fell Off</th>
                            </tr>
                            <tr v-if="individual.keywordPlacement.Page1">
                                <td >{{ individual.keywordPlacement.Page1 }}</td>
                                <td >{{ individual.keywordPlacement.AlmostThere }}</td>
                                <td >{{ individual.keywordPlacement.Pages2To5 }}</td>
                                <td>FILL</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 0px;">
                    <div class="col-md-12 col-sm-12" style="padding: 0px;">
                        <h3>Ranking Performance</h3>
                    </div>
                    <div class="col-md-12" style="padding: 0px;">
                        <table class="table table-striped">
                            <tr>
                                <th>Newly Ranked</th>
                                <th>Improved Ranks</th>
                                <th>Lost Ranks</th>
                            </tr>
                            <tr v-for="val in individual.analytics">
                                <td>FILL</td>
                                <td>FILL</td>
                                <td>FILL</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div id="individual-ppc-performance">
            <div class="row" >
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <h3>PPC Performance</h3>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-10 col-sm-10">
                    <span>Active for: FILL</span>
                </div>
                <div class="col-md-1 col-sm-1"></div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-striped">
                        <tr>
                            <th>Paid keywords</th>
                            <th>Monthly PPC Clicks</th>
                            <th>Monthly PPC Budget</th>
                            <th>Missed Monthly Impression</th>
                        </tr>
                        <tr v-for="val in individual.analytics">
                            <td>{{ val.num_paid_keywords }}</td>
                            <td>{{ val.paid_clicks_per_month }}</td>
                            <td>{{ val.monthly_adwords_budget }}</td>
                            <td>FILL</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>

    <div id="competitor-report" v-if="state === 'competitor' && analytics.length > 0">
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
                    <tr v-for="val in analytics">
                        <td> {{ val.url }}</td>
                        <td>{{ val.num_organic_keywords }}</td>
                        <td>{{ val.organic_clicks_per_month }}</td>
                        <td>{{ val.daily_organic_traffic_value }}</td>
                    </tr>
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
                        <tr v-for="val in analytics">
                            <td>{{ val.url }}</td>
                            <td>{{ val.num_paid_keywords }}</td>
                            <td>{{ val.paid_clicks_per_month }}</td>
                            <td>{{ val.daily_adwords_budget }}</td>
                            <td>{{ val.monthly_adwords_budget }}</td>
                        </tr>
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
                    <tr v-for="organic in topCompetitors.organic">
                        <td>{{ organic.domainName }}</td>
                        <td>{{ organic.overlap }}</td>
                        <td>{{ organic.commonKeywords }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-5 col-sm-5">
                <table class="table table-striped">
                    <tr>
                        <th>Domain Name</th>
                        <th>Overlap</th>
                        <th>Common Keywords</th>
                    </tr>
                    <tr v-for="paid in topCompetitors.paid">
                        <td>{{ paid.domainName }}</td>
                        <td>{{ paid.overlap }}</td>
                        <td>{{ paid.commonKeywords }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1 col-sm-1"></div>
        </div>
    </div>

    <div v-if="loading" class="loader">
        <div class="loader-inner"></div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/vue@2.4.1"></script>
<script src="/assets/js/report.js"></script>
<style>
    .bootstrap-link {
        cursor: pointer;
    }
</style>
</body>
</html>
