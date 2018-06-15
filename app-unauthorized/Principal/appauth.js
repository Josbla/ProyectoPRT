
    angular.module('appAuth', [])
    .controller('appAuthController',['$scope','$http', function($scope, $http){
        $scope.uName;
        $scope.uPwd;
        $scope.uPwd2;

        $scope.enviarData = function(){
            if($scope.uPwd!='' & $scope.uPwd!=null){
                $scope.uPwd = encryPass($scope.uPwd);
            }
        }

        $scope.enviarDataCambioPass = function(){
            if($scope.uPwd!='' & $scope.uPwd!=null & $scope.uPwd2!='' & $scope.uPwd2!=null){
                $scope.uPwd = encryPass($scope.uPwd);
                $scope.uPwd2 = encryPass($scope.uPwd2);
            }
        }

        function encryPass(uPwd){
            var encryptedPwd=CryptoJS.SHA3(uPwd).toString();
            return encryptedPwd;
        }
    }]);
