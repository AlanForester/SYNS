app = angular.module 'tsApp', []

app = angular.module 'tsApp'
class GlobalCtrl

  @$inject: ['$scope']
  constructor: (@scope) ->
    @scope.demo = 'Simple class demo'


app.controller 'GlobalCtrl', GlobalCtrl



