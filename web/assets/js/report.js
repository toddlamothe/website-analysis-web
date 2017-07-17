var app = new Vue({
    el: '#root',

    data: {
        url: 'https://unionstreetmedia.com/',
        competitor1url: 'http://www.bostonlogic.com/',
        competitor2url: 'http://www.realestatewebmasters.com/',
        competitor3url: 'https://placester.com/',
        analytics: [],
        topCompetitors: [],
        state: 'index',
        states: [
            'index',
            'individual',
            'competitor'
        ],
        individual: {
            analytics: []
        }
    },

    methods: {
        run: function () {
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
            }

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
                } else if (response.success == false) {

                } else {

                }
            })
            .fail(function(jqXHR) {
                console.log(jqXHR);
            });
        },

        runIndividualReport: function () {
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