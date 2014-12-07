var g = require('./global');

module.exports = {
    get: function(id, then){
        var sql = ' SELECT * FROM `2014Fall_Food_Types` ';
        if(id){
            sql += ' WHERE id = ' + id;
        }
        g.fetchAll(sql, then);
    }
}

