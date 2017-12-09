var fs = require('fs');
var Client = require('ftp');
var c = new Client();
c.on('ready', function () {
    fs.readdirSync(__dirname).forEach((file,index,arr) => {
switch(process.argv[2]){
	  case 'php' : 
	  if(file.match('.php')){
        c.put(file, file, function (err) {
          if (err) throw err;
          c.end();
          console.log(file + " upado com sucesso!");
        });
	  }
		break;
		  case 'html' : 
		   if(file.match('.html')){
        c.put(file, file, function (err) {
          if (err) throw err;
          c.end();
          console.log(file + " upado com sucesso!");
        });
		   }
		break;
		default:
		  c.put(process.argv[2], process.argv[2], function (err) {
      if (err) throw err;
      c.end();
      console.log(process.argv[2] + " upado com sucesso!");
      process.exit();
    });
		break;
      }
    })
});


// connect to localhost:21 as anonymous
c.connect({
  host: 'ftp.r2210.com',
  user: 'isrmicha@r2210.com',
  password: '16691000'
});