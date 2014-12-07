var mysql = null, pool = null;

function get(options, callback){
	var http = require("http");
	return http.get(options, function(response) {
			var body = '';
			response.on('data',function(data){
				body += data;
			});
			response.on('end',function(){
				callback(body);
			});
		})
}

function getConnection(callback){ 
	if(!pool){
	    mysql = require('mysql');
    	pool = mysql.createPool(
            {
              host     : process.env.IP,
              user     : 'jewpaltz_1',
              password : '',
              database : 'c9',
            }
        );
	}
	var connection = mysql.createConnection(
        {
          host     : process.env.IP,
          user     : 'jewpaltz_1',
          password : '',
          database : 'c9',
        }
    );
    connection.connect();
    return connection;
}

function fetchAll(sql, then, on_error){
    var connection = getConnection();
 
    connection.query(sql, function(err, rows, fields) {
        //connection.end();
        console.log(sql);
        if (err){
            console.log(err)
            if(on_error){
                on_error( err );
            }
        } 
        then(rows);
    });
     
}

module.exports = {
	get: get,
	getConnection: getConnection,
	fetchAll: fetchAll
}
