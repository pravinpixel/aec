app.directive("proposalAction", function () {
    return {
        restrict: 'E',
        scope: {
            data     : "=data",
            view     : "=view",
            download : "=download",
            duplicate: "=duplicate",
            delete   : "=delete",
        }, 
        templateUrl: `${$("#baseurl").val()}templates/ProposalAction.html`,
        link: function (scope, element, attrs) {
            console.log(scope)
        }
    }
});

app.directive("proposalActionVersion", function () {
    return {
        restrict: 'E',
        scope: {
            data     : "=data",
            view     : "=view",
            download : "=download",
            duplicate: "=duplicate",
            delete   : "=delete",
        }, 
        templateUrl: `${$("#baseurl").val()}templates/ProposalActionVersion.html`,
        link: function (scope, element, attrs) {
            console.log(scope)
        }
    }
});
