var app = new Vue({
    el: '#root',

    data: {
        url: '',
        competitor1url: '',
        competitor2url: '',
        competitor3url: '',
        analytics: [],
        topCompetitors: {
            organic: []
        },
        state: 'index',
        states: [
            'index',
            'individual',
            'competitor'
        ],
        individual: {
            analytics: [],
            keywordPlacement: {

            }
        },
        debug: false,
        loading: false,
        /* Vue data-tables */
        topCompetitorsColumns: [
            'domainName', 'overlap', 'commonKeywords'
        ],
        topCompetitorNames: {
            domainName: 'Domain Name',
            overlap: 'Overlap',
            commonKeywords: 'Common Keywords'
        },
        competitorSeoColumns: [
            'url', 'num_organic_keywords', 'organic_clicks_per_month', 'daily_organic_traffic_value'
        ],
        competitorSeoNames: {
            url: 'Domain',
            num_organic_keywords: 'Organic Keywords',
            organic_clicks_per_month: 'Organic clicks/mo',
            daily_organic_traffic_value: 'Daily Organic Traffic Value'
        },
        competitorPpcColumns: [
            'url', 'num_paid_keywords', 'paid_clicks_per_month', 'daily_adwords_budget', 'monthly_adwords_budget'
        ],
        competitorPpcNames: {
            url: 'Domain',
            num_paid_keywords: 'Paid Keywords',
            paid_clicks_per_month: 'Paid clicks/mo',
            daily_adwords_budget: 'Daily Adwords Budget',
            monthly_adwords_budget: 'Monthly Adwords Budget'
        }
    },
    mounted: function () {
        this.state = 'competitor';
        if (this.debug == true) {
            this.url = 'https://unionstreetmedia.com/';
            this.competitor1url = 'http://www.bostonlogic.com/';
            this.competitor2url = 'http://www.realestatewebmasters.com/';
            this.competitor3url = 'https://placester.com/';

        }
    },

    methods: {

        run: function () {
            if (this.url.length == 0) {
                alert('Url is required.');

                return;
            }

            if (this.state === 'competitor') {
                return this.runCompetitorReport();
            }

            return this.runIndividualReport();
        },
        
        runCompetitorReport: function () {
            var data = {
                url: this.url,
                competitors: [
                    this.competitor1url,
                    this.competitor2url,
                    this.competitor3url
                ]
            };

            if (this.competitor1url.length == 0 && this.competitor2url.length == 0 && this.competitor3url.length == 0) {
                alert('Provide at least one competitor url.');

                return;
            }

            this.loading = true;
            $.ajax({
                url: '/get-competitor-report/',
                data: data,
                type: 'POST'
            })
            .done(function (response) {
                var data = response.data;
                if (response.success == true) {
                    app.analytics = data.analytics;
                    app.topCompetitors = data.topCompetitors;
                    app.organic = data.topCompetitors.organic;
                    app.loading = false;
                } else if (response.success == false) {

                } else {

                }
            })
            .fail(function(jqXHR) {
                console.log(jqXHR);
            });
        },

        runIndividualReport: function () {
            this.loading = true;
            var data = {
                url: this.url,
            }

            $.ajax({
                url: '/get-individual-report/',
                data: data,
                type: 'POST'
            })
            .done(function (response) {
                var data = response.data;
                if (response.success == true) {
                    app.individual.analytics = [];
                    app.individual.analytics.push(data.analytics);
                    app.individual.keywordPlacement = data.keywordPlacement;
                    app.loading = false;
                } else if (response.success == false) {

                } else {

                }
            })
            .fail(function(jqXHR) {
                console.log(jqXHR);
            });
        },

        showCompetitorPage: function () {
            app.state = 'competitor';
        },

        showIndividualPage: function () {
            app.state = 'individual';
        }
    }

});