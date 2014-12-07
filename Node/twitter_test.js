var express = require('express');
var app = express();
var twitter = require("twitter");

app.use(express.static(__dirname + '/../playground'));

var twit = new twitter({
    consumer_key: 'kFi19dYdh3bUIWqLrmdnMYu7T',
    consumer_secret: 'lGPrBkEPHRMMXXyn0jDY24bNthL4MikzGsQXLUeipY2dsG8DIu',
    access_token_key: '21572028-otIabQh4nQ5OAlYzmUPxOWBp9TzE0hCK6pkMwlW5Z',
    access_token_secret: 'mQwE7O5W9YYTeY356yB5Oh2SiqVk3N8ta5mF2AZ83HMCE'
});

app.get('/', twit.gatekeeper('/twauth'), function(req, res){
    res.send("You're in!");
});
app.get('/login', function(req, res){
    //res.send("<a href='/twauth'>Log in with Twitter</a>");
    twit.search('new+paltz', function(data) {
        res.send(data);
    });
});
app.get('/twauth', twit.login());

app.listen(process.env.PORT);