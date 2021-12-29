
app.directive('viewlist', function() {
    var directive = {};
    directive.restrict = 'E';
    directive.templateUrl = 'view-list';
    directive.scope = {
        viewLists : "=data"
    }

    return directive;
 });
 app.directive('filename', function() {
    var directive = {};
    directive.restrict = 'E';
    directive.template= `<span ng-init="'filename='click here';">{{filename}} </span>`;
    directive.scope = {
        filename : "=data"
    }

    return directive;
 });
 