<html>
<head>
<title>Insert Data Using AngularJS and CodeIgniter</title>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body>

<div ng-app="myapp" ng-controller="employeecontroller">
 
<table> 
<tr>
<td>Employee Name:</td>
<td> <input type="text" ng-model="employee_name"/></td>
</tr> 
	
<tr>
<td>Email Address:</td>
<td> <input type="email" ng-model="email"/></td>
</tr> 
	
<tr>
<td>Phone Number:</td>
<td> <input type="number" ng-model="phone"/></td>
</tr> 
	
<tr>
<td>Address:</td>
<td> <textarea ng-model="ads" cols="22" rows="5"></textarea></td>
</tr> 
<tr>
<td></td>
<td> 
 
<input type="submit" name="btnInsert" value="Add Employee" ng-click="insertdata()"/>
 
</td>
</tr>
</table>
 <br>
	
<div>{{message}}</div>
</div>
	
	
<script>
var app = angular.module("myapp",[]);
app.controller("employeecontroller",function($scope,$http){
	$scope.insertdata = function() {
		$http.post("<?php echo base_url(); ?>EmployeeController/InsertEmployee/",{'employee_name':$scope.employee_name,'email':$scope.email,'phone':$scope.phone,'address':$scope.ads})
		.success(function(data,status,headers,config){
 
           $scope.message = "Inserted Successfully!";
			
		});
		
	}

});

</script>
</body>
</html>