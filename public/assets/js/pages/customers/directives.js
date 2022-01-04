
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
    directive.template= "{{filename}}";
    directive.scope = {
        filename : "=data"
    }

    return directive;
 });

 //popup directives
