var g = require('./models/global');
var model = require("./models/food");
var types_model = require("./models/food_types");
var express = require('express');
var app = express();
var bodyParser = require('body-parser');

app.use( bodyParser.json() );       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({ extended: true }));

app.use(express.static(__dirname + '/client'));
app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

app.route('/food')
	.get(function (req, res) {
		model.get(null, function(food){
			types_model.get(null, function(food_types){
	  		res.send({ food: food, food_types: food_types});
			});
		})
	})
	.post(function(req, res){
			req.body.UserId = 2;
			model.create(req.body, function(status){
				console.log(status);
				model.get(status.insertId, function(rows){
	  				res.send({ status: status, row: rows[0] });
				});
			});
	});
app.route('/food/:id')
	.get(function (req, res) {
		model.get(req.params.id, function(data){
	  	res.send(data);
		})
	})
	.put(function(req, res){
			model.update(req.body, function(status){
				model.get(req.params.id, function(rows){
	  				res.send({ status: status, row: rows[0] });
				});
			});
	})
	.delete(function(req, res){
			model.delete(req.params.id, function(status){
	  			res.send({ status: status });
			});
	});
app.route('/beers')
	.get(function (req, res) {
		g.get("http://api.openbeerdatabase.com/v1/beers.json", function(data) {
			//console.log(data)
		    res.send(data);
		})
	})
app.get('/food/search/:q', function (req, res) {
	model.search(req.params.q, function(data) {
		//console.log(data)
	    res.send(data);
	});
});
var server = app.listen(process.env.PORT, function () {
  console.log('Example app listening at http://%s:%s',process.env.IP, server.address().port);
});