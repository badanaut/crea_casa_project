const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const mysql = require('mysql');
var querySelectorAll = require('query-selector');
var path = require('path');
var url = require('url');  
var fs = require('fs'); 

app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static('../crea_casa_project'));
var mysqlConnection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "reviews_db",
  connectionLimit: 10
});

mysqlConnection.connect((err)=>{
   if(err){
        console.log("Error!");        
      }
    else{
        console.log("Succes!!!");        
      }           
});

app.listen(3000,()=>console.log("Express server is running at port nr: 3000"));

// app.get('/', (req, res)=>{
//   mysqlConnection.query("select * from reviews_table",(err, rows, fields)=>{
//       if(!err){
//         // res.send(rows);
//         console.log(rows)
//       }
//       else{
//         console.log(err);
//       }    
//   });
// });
// app.get('/submit/:id', (req, res)=>{
//   mysqlConnection.query("select * from reviews_table where Id = ?",[req.params.id],(err, rows, fields)=>{
//       if(!err){
//         res.send(rows);
//       }
//       else{
//         console.log(err);
//       }    
//   });
// });
app.post('/send', (req, res)=>{
  const lastname = req.body.lastname;
  const firstname = req.body.firstname;
  const email = req.body.email;
  const message = req.body.message;
  const nota = req.body.nota;  
  var sql ="insert into reviews_table (`Nume`, `Prenume`, `Email`, `Mesaj`, `Nota`)\
   values (?,?,?,?,?)"
   mysqlConnection.query(sql,[lastname,firstname,email,message,nota],(err, rows, fields)=>{
      if(!err){
        console.log("Review added!!");          
         res.end();
      }
      else{
        console.log(err);
      } 

  });


});
