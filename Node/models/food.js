var g = require('./global');

module.exports = {
    get: function(id, then){
        var sql =   ' SELECT F.*, T.Name as T_Name '
                +   ' FROM `2014Fall_Food_Eaten` F  '
                +   '   Left Join `2014Fall_Food_Types` T ON F.Type_id = T.id ';
        if(id){
            sql += ' WHERE F.id = ' + id;
        }
        g.fetchAll(sql, then);
    },
    update: function(row, then){
        var row2 = row;
		var sql =   " Update 2014Fall_Food_Eaten "
			    +   " Set Name='" + row2.Name + "', Type_id='" + row2.Type_id + "', Calories='" + row2.Calories + "',"
				+   " Fat='" + row2.Fat + "', Carbs='" + row2.Carbs + "', Fiber='" + row2.Fiber + "', Time='" + row2.Time + "'"
		        +   " WHERE id = " + row2.id ;
		g.fetchAll(sql, then);        
    },
    create: function(row, then){
        var row2 = row;
		var sql =   " INSERT INTO 2014Fall_Food_Eaten "
				+	" (Name, Type_id, Calories, Fat, Carbs, Fiber, Time, UserId, created_at) "
				+	" VALUES ('" + row2.Name + "', '" + row2.Type_id + "', '" + row2.Calories + "', '" + row2.Fat + "', '" + row2.Carbs + "', '" + row2.Fiber + "', '" + row2.Time + "', '" + row2.UserId + "', Now() ) ";				
		g.fetchAll(sql, then);        
    },
    delete: function(id, then){
		var sql =   " DELETE FROM 2014Fall_Food_Eaten WHERE id = " + id;
		g.fetchAll(sql, then);        
    }
}

