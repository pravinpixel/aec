
app.directive('viewlist', function(API_URL) {
    var directive = {};
    directive.restrict = 'E';
    directive.templateUrl = `${API_URL}customers/view-list`;
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
